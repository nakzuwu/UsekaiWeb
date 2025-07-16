<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile');
    }

    public function updateUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . auth('admin')->id(),
        ]);

        $admin = auth('admin')->user();
        $admin->username = $request->username;
        $admin->save();

        return back()->with('success', 'Username updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $admin = auth('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('success', 'Current password is incorrect.');
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
