<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
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
}
