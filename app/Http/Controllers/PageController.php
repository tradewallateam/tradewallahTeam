<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $teams = TeamMember::where('status', true)->get();
        return view('index', compact('teams'));
    }

    public function about()
    {
        $teams = TeamMember::where('status', true)->get();
        $about = About::with('aboutCarts')->first();
        return view('pages.about', compact('teams', 'about'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
