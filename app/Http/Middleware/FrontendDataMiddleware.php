<?php

namespace App\Http\Middleware;

use App\Models\ClientTestimonial;
use App\Models\ContactSetting;
use App\Models\FooterSetting;
use App\Models\Header;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class FrontendDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        View::share([
            // Share any data needed across frontend views here
            'headerData' => Header::first(),
            'socialMediaLinks' => SocialMedia::first(),
            'contact' => ContactSetting::first(),
            'testimonials' => ClientTestimonial::where('is_active', true)->get(),
            'footer' => FooterSetting::first()
        ]);
        return $next($request);
    }
}
