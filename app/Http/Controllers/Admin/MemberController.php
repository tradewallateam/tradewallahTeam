<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::role('member')->with('memberProfile')->get();
        // dd($members);
        return view('admin.pages.members', compact('members'));
    }
}
