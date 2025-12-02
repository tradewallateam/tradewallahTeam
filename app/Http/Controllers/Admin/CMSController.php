<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutCart;
use App\Models\ClientTestimonial;
use App\Models\ContactSetting;
use App\Models\FooterSetting;
use App\Models\GalleryFolder;
use App\Models\GalleryImage;
use App\Models\GeneralSiteSetting;
use App\Models\Header;
use App\Models\PaidLink;
use App\Models\Service;
use App\Models\ServiceDetails;
use App\Models\SocialMedia;
use App\Models\TeamMember;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Raw;

class CMSController extends Controller
{

    /**
     * Show the manage header page.
     * @return \Illuminate\View\View
     * All CURD operations for Header will be handled here.
     */

    public function manageHeader()
    {
        $header = Header::first();
        return view('admin.pages.cms.manage-header', compact('header'));
    }

    public function updateHeader(Request $request)
    {
        $request->validate([
            'phone_number'         => 'nullable|string|max:30',
            'email'                => 'nullable|email|max:255',
            'location'             => 'nullable|string|max:255',
            'title'                => 'nullable|string|max:255',
            'subtitle'             => 'nullable|string|max:255',
            'subtitle_description' => 'nullable|string',
            'video_link'           => 'nullable|url',

            'background_image_1'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'background_image_2'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'square_logo'          => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'horizontal_logo'      => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
            'png_square_logo'      => 'nullable|mimes:png|max:2048',
            'png_horizontal_logo'  => 'nullable|mimes:png|max:5120',
            'favicon'              => 'nullable|mimes:ico,png|max:512',
        ]);

        $header = Header::firstOrCreate(['id' => 1]);

        $data = $request->only([
            'phone_number',
            'email',
            'location',
            'title',
            'subtitle',
            'subtitle_description',
            'video_link'
        ]);

        // List of all possible image fields in your model
        $imageFields = [
            'background_image_1',
            'background_image_2',
            'square_logo',
            'horizontal_logo',
            'png_square_logo',
            'png_horizontal_logo',
            'favicon'
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                if ($header->$field && Storage::disk('public')->exists($header->$field)) {
                    Storage::disk('public')->delete($header->$field);
                }

                $path = $request->file($field)->store('headers', 'public');
                $data[$field] = $path;
            }
        }

        $header->update($data);

        return redirect()->route('admin.pages.cms.manage-header')
            ->with('success', 'All header settings have been updated successfully!');
    }

    public function manageSocialMedia()
    {
        $socialMedia = SocialMedia::first();
        return view('admin.pages.cms.manage-social-media', compact('socialMedia'));
    }

    public function updateSocialMedia(Request $request)
    {
        try {

            $request->validate([
                'facebook' => 'required|url',
                'instagram' => 'required|url',
                'linked_in' => 'required|url',
                'twitter' => 'required|url',
            ]);
            $socialMedia = SocialMedia::first() ?? new SocialMedia();
            $socialMedia->facebook = $request->facebook;
            $socialMedia->instagram = $request->instagram;
            $socialMedia->linked_in = $request->linked_in;
            $socialMedia->twitter = $request->twitter;
            $socialMedia->save();
            return redirect()->back()
                ->with('success', 'Social media links updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error updating social media links: ' . $th->getMessage())->withInput();
        }
    }

    public function managePage()
    {
        $about = About::with('aboutCarts')->first();
        $services = Service::all();
        $contact = ContactSetting::first();
        $footer = FooterSetting::first();
        return view('admin.pages.cms.manage-page', compact('about', 'services', 'contact', 'footer'));
    }

    public function updateAboutPage(Request $request)
    {
        try {
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'image_1'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048',
                'image_2'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048',

                'cart_items'                => 'nullable|array',
                'cart_items.*.id'           => 'nullable|integer|exists:about_carts,id',
                'cart_items.*.title'        => 'required_with:cart_items.*|string|max:255',
                'cart_items.*.description'  => 'required_with:cart_items.*|string',
            ]);

            $about = About::updateOrCreate(
                ['id' => 1],
                [
                    'title'       => $request->title,
                    'description' => $request->description,
                ]
            );

            if ($request->hasFile('image_1')) {
                if ($about->image_1 && file_exists(public_path('storage/' . $about->image_1))) {
                    unlink(public_path('storage/' . $about->image_1));
                }
                $path = $request->file('image_1')->store('about', 'public');
                $about->image_1 = $path;
                $about->save();
            }

            if ($request->hasFile('image_2')) {
                if ($about->image_2 && file_exists(public_path('storage/' . $about->image_2))) {
                    unlink(public_path('storage/' . $about->image_2));
                }
                $path = $request->file('image_2')->store('about', 'public');
                $about->image_2 = $path;
                $about->save();
            }

            $incomingItems = $request->input('cart_items', []);
            $incomingIds   = array_filter(array_column($incomingItems, 'id')); // Only existing IDs

            if (!empty($incomingIds)) {
                AboutCart::where('about_id', $about->id)
                    ->whereNotIn('id', $incomingIds)
                    ->delete();
            } else {
                AboutCart::where('about_id', $about->id)->delete();
            }

            // Update or Create each cart item
            foreach ($incomingItems as $item) {
                AboutCart::updateOrCreate(
                    [
                        'id' => $item['id'] ?? null,
                        'about_id' => $about->id,
                    ],
                    [
                        'title'       => $item['title'],
                        'description' => $item['description'],
                    ]
                );
            }

            return redirect()->route('admin.pages.cms.manage-page')
                ->with('success', 'About page updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function addService(Request $request)
    {
        try {
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048',
                'is_active'   => 'required|boolean',
            ]);

            $data = $request->only(['title', 'description', 'is_active']);

            if ($request->hasFile('banner_image')) {
                $path = $request->file('banner_image')->store('services', 'public');
                $data['banner_image'] = $path;
            }

            Service::create($data);

            return redirect()->route('admin.pages.cms.manage-page')
                ->with('success', 'Service added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding service: ' . $th->getMessage())->withInput();
        }
    }

    public function deleteService($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $service = Service::findOrFail($id);
            if ($service->banner_image && Storage::disk('public')->exists($service->banner_image)) {
                Storage::disk('public')->delete($service->banner_image);
            }
            $service->delete();
            return redirect()->route('admin.pages.cms.manage-page')
                ->with('success', 'Service deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error deleting service: ' . $th->getMessage());
        }
    }

    public function teamSettings()
    {
        $teams = TeamMember::all();
        return view('admin.pages.cms.team-settings', compact('teams'));
    }

    public function addTeamMember(Request $request)
    {
        try {
            $request->validate([
                'name'           => 'required|string|max:255',
                'position'       => 'required|string|max:255',
                'image'          => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5048',
                'facebook_link'  => 'nullable|url',
                'twitter_link'   => 'nullable|url',
                'linkedin_link'  => 'nullable|url',
                'instagram_link' => 'nullable|url',
                'status'         => 'required|boolean',
            ]);

            $data = $request->only([
                'name',
                'position',
                'facebook_link',
                'twitter_link',
                'linkedin_link',
                'instagram_link',
                'status',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('team_members', 'public');
                $data['image'] = $path;
            }

            \App\Models\TeamMember::create($data);

            return redirect()->route('admin.pages.cms.team-settings')
                ->with('success', 'Team member added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding team member: ' . $th->getMessage())->withInput();
        }
    }

    public function deleteTeamMember($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $member = TeamMember::findOrFail($id);
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                Storage::disk('public')->delete($member->image);
            }
            $member->delete();
            return redirect()->route('admin.pages.cms.team-settings')
                ->with('success', 'Team member deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error deleting team member: ' . $th->getMessage());
        }
    }

    public function teamMemberStatusChange($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $member = TeamMember::findOrFail($id);
            $member->status = !$member->status;
            $member->save();
            return redirect()->route('admin.pages.cms.team-settings')
                ->with('success', 'Team member status updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error updating team member status: ' . $th->getMessage());
        }
    }

    public function viewService($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $service = Service::with('serviceDetails')->findOrFail($id);
            return view('admin.pages.cms.view-service', compact('service'));
        } catch (Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    public function serviceChangeStatus($serviceId)
    {
        try {
            $serviceId = Crypt::decrypt($serviceId);
            $service = Service::findOrFail($serviceId);
            $service->is_active = ! $service->is_active;
            $service->save();
            return redirect()->back()->with('success', 'Status change successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function updateServiceDetails(Request $request, $id)
    {
        try {

            $serviceId = Crypt::decrypt($id);
            $service = Service::findOrFail($serviceId);
            if (!$service) {
                return redirect()->back()->with('failed', "Service Id is not valid");
            }
            $details = $service->serviceDetails ?? new ServiceDetails();
            $details->service_id = $service->id;
            if ($request->hasFile('banner')) {
                if ($details->banner && Storage::disk('public')->exists($details->banner)) {
                    Storage::disk('public')->delete($details->banner);
                }
                $details->banner = $request->file('banner')->store('service/banner', 'public');
            }
            $details->description = $request->description;
            $details->save();
            return redirect()->back()->with('success', 'Details updated successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function generalSiteSetting()
    {
        $generalSetting = GeneralSiteSetting::first();
        return view('admin.pages.cms.general-site-setting', compact('generalSetting'));
    }

    public function generalAboutSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->about_title = $request->about_title;
            $setting->about_description = $request->about_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalServiceSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->service_title = $request->service_title;
            $setting->service_description = $request->service_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalTeamSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->team_title = $request->team_title;
            $setting->team_description = $request->team_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalPricingSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->pricing_title = $request->pricing_title;
            $setting->pricing_description = $request->pricing_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalRiskDisclaimerSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->risk_disclaimer_title = $request->risk_disclaimer_title;
            $setting->risk_disclaimer_description = $request->risk_disclaimer_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalContactSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->contact_title = $request->contact_title;
            $setting->contact_description = $request->contact_description;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }
    public function generalTestimonialSetting(Request $request)
    {
        try {
            $setting = GeneralSiteSetting::first() ?? new GeneralSiteSetting();
            $setting->testimonial_title = $request->testimonial_title;
            $setting->testimonial_description = $request->testimonial_description;
            $setting->happy_traders = $request->happy_traders;
            $setting->client_rating = $request->client_rating;
            $setting->total_client_volume = $request->total_client_volume;
            $setting->save();
            return redirect()->back()->with('success', 'Setting update successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }

    public function contactSetting(Request $request)
    {
        try {
            $contact = ContactSetting::first() ?? new ContactSetting();
            $contact->contact_title = $request->contact_title;
            $contact->contact_description = $request->contact_description;
            $contact->address = $request->address;
            $contact->email  = $request->email;
            $contact->phone_number  = $request->phone_number;
            $contact->map_link  = $request->map_link;
            $contact->save();

            return redirect()->back()->with('success', 'Contact setting update successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }

    public function gallerySetting(Request $request)
    {
        $folders = GalleryFolder::get();
        return view('admin.pages.cms.gallery-setting', compact('folders'));
    }

    public function addGallerFolder(Request $request)
    {
        try {
            GalleryFolder::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('success', 'Folder added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function changeGalleryFolderStatus(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $gallery = GalleryFolder::findOrFail($id);
            $gallery->status = !$gallery->status;
            $gallery->save();

            return redirect()->back()->with('success', "Status has been changed");
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }

    public function gellaryFolderDelete($id)
    {
        try {
            $id  = Crypt::decrypt($id);
            $folder = GalleryFolder::find($id);
            if ($folder) {
                $folder->delete();
                return redirect()->back()->with('success', 'Folder deleted successfully!');
            }
            return redirect()->back()->with('failed', 'Folder not deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function viewGallerFolder($folder_name, $folder_id)
    {
        $decId = Crypt::decrypt($folder_id);
        $folder = GalleryFolder::with('galleryImage')->find($decId);

        if (empty($folder)) {
            return redirect()->back()->with('failed', 'Image not found');
        }

        return view('admin.pages.cms.gallery-image', compact('folder'));
    }

    public function updateGalleryImages(Request $request, $folder_id)
    {
        try {
            $folderId = Crypt::decrypt($folder_id);

            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('gallery/' . $folderId, $imageName, 'public');

                    GalleryImage::create([
                        'gallery_folder_id' => $folderId,
                        'image'     => $imagePath,
                        'title' => $request->title ?? "",
                        'status' => true,
                    ]);
                }
            }

            return back()->with('success', 'Images uploaded successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong while uploading images.');
        }
    }

    public function galleryImageDelete($image_id)
    {
        try {
            $image = GalleryImage::findOrFail(Crypt::decrypt($image_id));

            if (!$image) {
                return redirect()->back()->with('failed', 'Image not found!');
            }
            $image->delete();

            return redirect()->back()->with('success', 'Image successfully deleted!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function galleryImageChangeStatus($image_id)
    {
        try {

            $Id = Crypt::decrypt($image_id);
            $image = GalleryImage::findOrFail($Id);
            $image->status = !$image->status;
            $image->save();
            return redirect()->back()->with('success', 'Image status change successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function clientTestimonials()
    {
        $testimonials = ClientTestimonial::get();
        return view('admin.pages.cms.client-testimonial', compact('testimonials'));
    }

    public function addTestimonial(Request $request)
    {
        try {
            $testimonial = new ClientTestimonial();
            $testimonial->name = $testimonial->name;
            $testimonial->designation = $request->designation;
            if ($request->hasFile('image')) {
                $testimonial->image = $request->file('image')->store('client/testimonial', 'public');
            }
            $testimonial->rating = $request->rating;
            $testimonial->message = $request->message;
            $testimonial->is_active = $request->is_active;
            $testimonial->save();
            return redirect()->back()->with('success', "Testimonial added successfully!!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function clientTestimonialStatusChange($id)
    {
        try {
            $testimonial = ClientTestimonial::findOrFail(Crypt::decrypt($id));
            $testimonial->is_active = !$testimonial->is_active;
            $testimonial->save();
            return redirect()->back()->with('success', 'Status change successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function deleteClientTestimonial($id)
    {
        try {
            $clientTestimonial = ClientTestimonial::findOrFail(Crypt::decrypt($id));
            if ($clientTestimonial) {
                $clientTestimonial->delete();
                return redirect()->back()->with('success', 'Testimonial delete successfully!!');
            }
            return redirect()->back()->with('failed', 'Somthing error occured');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function paidLinks()
    {
        $links = PaidLink::get();
        return view('admin.pages.cms.paid-links', compact('links'));
    }

    public function addPaidLink(Request $request)
    {
        try {
            $link = new PaidLink();
            $link->link_name = $request->link_name;
            $link->type = $request->type;
            $link->link_url = Crypt::encrypt($request->link_url);
            $link->status = $request->status;
            $link->save();

            return back()->with('success', 'link added successfully!!');
        } catch (\Throwable $th) {
            return back()->with('failed', $th->getMessage());
        }
    }

    public function paidLinkChangeStatus($id)
    {
        try {
            $link = PaidLink::findOrFail(Crypt::decrypt($id));
            $link->status = ! $link->status;
            $link->save();
            return back()->with('success', 'Status change successfully!');
        } catch (\Throwable $th) {
            return back()->with('failed', $th->getMessage());
        }
    }

    public function paidLinkDelete($id)
    {
        try {
            $link = PaidLink::findOrFail(Crypt::decrypt($id));
            if ($link) {
                $link->delete();
                return redirect()->back()->with('success', 'Link Deleted successfully!!');
            }
            return redirect()->back()->with('failed', 'Somthing error occured');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function updateFooter(Request $request)
    {
        try {

            $footer = FooterSetting::first() ?? new FooterSetting();
            $footer->description = $request->description;
            $footer->privacy_policy = $request->privacy_policy;
            $footer->terms_conditions = $request->terms_conditions;
            $footer->save();

            return back()->with('success', 'Footer setting has been updated successfully');
        } catch (\Throwable $th) {
            return back()->with('failed', $th->getMessage());
        }
    }
}
