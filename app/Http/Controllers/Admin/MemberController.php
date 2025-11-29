<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
{

    public function index()
    {
        $roleExists = Role::where('name', 'member')
            ->where('guard_name', 'web')
            ->exists();

        if ($roleExists) {
            $members = User::role('member')->with('memberProfile')->get();
        } else {
            $members = collect();
        }
        return view('admin.pages.members', compact('members'));
    }


    public function memberStatusChange(Request $request, $member_id)
    {
        try {
            $id = Crypt::decrypt($member_id);
            $user = User::with('memberProfile')->findOrFail($id);

            // Toggle status in the member table
            $user->memberProfile->status = !$user->memberProfile->status;
            $user->memberProfile->save();

            return redirect()->back()
                ->with('success', 'Status change successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Error updating member status: ' . $th->getMessage());
        }
    }
}
