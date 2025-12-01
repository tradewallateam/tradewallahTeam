<?php

namespace App\Http\Middleware;

use App\Models\Header;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {

            $user = Auth::user();

            View::share([
                'admin' => $user,
                'headerData' => Header::first(),
            ]);
            return $next($request);
        }
        return redirect()->route('auth.admin.login.form')->with('failed', 'Page expired. Please login again.');
    }
}
