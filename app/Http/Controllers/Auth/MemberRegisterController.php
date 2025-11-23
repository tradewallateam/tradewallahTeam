<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MemberRegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'email'      => 'required|string|email|max:255|unique:users',
                'phone'      => 'nullable|string|max:20',
                'password'   => 'required|string|min:8|confirmed',
                'terms'      => 'required',
            ]);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'    => $request->email,
                'phone_number'    => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            Member::create([
                'user_id'      => $user->id,
                'name'         => $request->first_name . ' ' . $request->last_name,
                'email'        => $request->email,
                'phone_number' => $request->phone,
                'address'      => 'Not Specified',
                'country'      => 'Not Specified',
                'status'       => true,
            ]);

            $role = Role::firstORCreate(['name' => 'member']);

            $user->assignRole($role);


            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Please login.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed! ' . $th->getMessage(),
            ], 500);
        }
    }
}
