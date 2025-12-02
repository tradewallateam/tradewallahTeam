<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactSetting;
use App\Models\FooterSetting;
use App\Models\GalleryFolder;
use App\Models\GeneralSiteSetting;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function home()
    {
        $teams = TeamMember::where('status', true)->get();
        $setting = GeneralSiteSetting::first();
        $services = Service::where('is_active', true)->latest()->take(3)->get();
        return view('index', compact('teams', 'setting', 'services'));
    }

    public function about()
    {
        $teams = TeamMember::where('status', true)->get();
        $about = About::with('aboutCarts')->first();
        return view('pages.about', compact('teams', 'about'));
    }

    public function services()
    {
        $services = Service::get();
        return view('pages.services', compact('services'));
    }

    public function serviceDetails($service_id)
    {
        $service_id = Crypt::decrypt($service_id);

        $service = Service::with('serviceDetails')->find($service_id);

        if (!$service) {
            return redirect()->back()->with('failed', 'Service id not valid');
        }
        return view('pages.service-details', compact('service'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function dashboard()
    {
        return view('pages.auth.dashboard');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function riskDisclaimer()
    {
        return view('pages.risk-disclaimer');
    }

    public function gallery()
    {
        $gallaries = GalleryFolder::get();
        return view('pages.gallery', compact('gallaries'));
    }
    public function privacyPolicy()
    {
        $footer = FooterSetting::first();
        return view('pages.privacy-policy', compact('footer'));
    }
    public function termsConditions()
    {
        $footer = FooterSetting::first();
        return view('pages.terms-conditions', compact('footer'));
    }
}
