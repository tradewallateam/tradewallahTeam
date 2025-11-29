<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profileSettings()
    {
        $profile = User::role('admin')->first();
        return view('admin.pages.profile', compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $admin = User::role('admin')->first();
            $admin->first_name = $request->name;
            $admin->email = $request->email;
            $admin->phone_number = $request->phone_number;
            $admin->address = $request->address;
            if ($request->hasFile('profile_image')) {
                $admin->image = $request->file('profile_image')->store('admin/profile/image', 'public');
            }

            if (
                $request->filled('current_password') ||
                $request->filled('password') ||
                $request->filled('password_confirmation')
            ) {
                if (!Hash::check($request->current_password, $admin->password)) {
                    return redirect()->back()->with('failed', 'Current password is incorrect!')->withInput();
                }

                if ($request->password !== $request->password_confirmation) {
                    return redirect()->back()->with('failed', 'New password and confirm password do not match!')->withInput();
                }

                if (strlen($request->password) < 8) {
                    return redirect()->back()->with('failed', 'New password must be at least 8 characters!')->withInput();
                }
                $admin->password = Hash::make($request->password);
            }

            $admin->save();
            return redirect()->back()->with('success', 'Your profile has been updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function logout(Request $request, $id = null)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('auth.admin.login.form')->with('success', 'Logged out successfully.');
    }
}
