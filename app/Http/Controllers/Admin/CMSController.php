<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutCart;
use App\Models\Header;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.pages.cms.manage-social-media');
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
            $socialMedia = SocialMedia::firstOrCreate(['id' => 1]);
            $socialMedia->update([
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'linked_in' => $request->input('linked_in'),
                'twitter' => $request->input('twitter'),
            ]);
            return redirect()->route('admin.pages.cms.manage-social-media')
                ->with('success', 'Social media links updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error updating social media links: ' . $th->getMessage());
        }
    }

    public function managePage()
    {
        $about = About::with('aboutCarts')->first();
        $services = Service::all();
        return view('admin.pages.cms.manage-page', compact('about', 'services'));
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

            // Update or Create the main About page
            $about = About::updateOrCreate(
                ['id' => 1],
                [
                    'title'       => $request->title,
                    'description' => $request->description,
                ]
            );

            // Handle Image 1
            if ($request->hasFile('image_1')) {
                // Delete old image if exists
                if ($about->image_1 && file_exists(public_path('storage/' . $about->image_1))) {
                    unlink(public_path('storage/' . $about->image_1));
                }
                $path = $request->file('image_1')->store('about', 'public');
                $about->image_1 = $path;
                $about->save();
            }

            // Handle Image 2
            if ($request->hasFile('image_2')) {
                if ($about->image_2 && file_exists(public_path('storage/' . $about->image_2))) {
                    unlink(public_path('storage/' . $about->image_2));
                }
                $path = $request->file('image_2')->store('about', 'public');
                $about->image_2 = $path;
                $about->save();
            }

            // === Smart Cart Items: Update existing, Create new, Delete removed ===
            $incomingItems = $request->input('cart_items', []);
            $incomingIds   = array_filter(array_column($incomingItems, 'id')); // Only existing IDs

            // Delete removed items
            if (!empty($incomingIds)) {
                AboutCart::where('about_id', $about->id)
                    ->whereNotIn('id', $incomingIds)
                    ->delete();
            } else {
                // If no items sent, delete all
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
}
