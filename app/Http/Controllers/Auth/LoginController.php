<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => ['required', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ]);

            if ($validator->fails()) {
                return redirect()->route('auth.admin.login.form')
                    ->withErrors($validator)
                    ->withInput();
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();

                $user = Auth::user();

                if ($user->hasRole('admin')) {
                    return redirect()->intended(route('admin.dashboard'))
                        ->with('success', 'Welcome back!');
                } else {
                    Auth::logout();
                    return redirect()->route('auth.admin.login.form')
                        ->with('failed', 'Access denied! You do not have admin privileges.');
                }
            }

            return redirect()->route('auth.admin.login.form')
                ->withInput()
                ->with('failed', 'Login failed! Please check your credentials.');
        } catch (\Throwable $th) {
            return redirect()->route('auth.admin.login.form')
                ->with('failed', 'Something went wrong: ' . $th->getMessage());
        }
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // ✅ Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }
    public function memberLogout(Request $request)
    {
        Auth::logout();

        // ✅ Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pages.home')->with('success', 'You have been logged out successfully.');
    }

    public function memberLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                $request->session()->regenerate();

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => route('pages.home'),
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password.'
            ], 401);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred during login: ' . $th->getMessage()
            ], 500);
        }
    }
}
