<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function logout(Request $request, $id = null)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('auth.admin.login.form')->with('success', 'Logged out successfully.');
    }
}
