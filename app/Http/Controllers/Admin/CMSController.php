<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
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
        try {
            $request->validate([
                'location' => 'nullable|string|max:255',
                'phone_number' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $header = Header::firstOrCreate(['id' => 1]);

            $logo = $header->logo;

            if ($request->hasFile('header_logo')) {

                if ($header->logo && Storage::disk('public')->exists($header->logo)) {
                    Storage::disk('public')->delete($header->logo);
                }

                $image = $request->file('header_logo');
                $logo = $image->store('headers', 'public');
            }

            $header->update([
                'location' => $request->input('location'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'logo' => $logo,
            ]);

            return redirect()->route('admin.pages.cms.manage-header')
                ->with('success', 'Header updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error updating header: ' . $th->getMessage());
        }
    }

    public function manageSocialMedia()
    {
        return view('admin.pages.cms.manage-social-media');
    }
}
