<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    /**
     * Show the change password form for authenticated admin.
     */
    public function edit()
    {
        return view('admin.auth.change-password');
    }

    /**
     * Update the authenticated user's password.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
        ], [
            'current_password.current_password' => 'The provided password does not match your current password.',
            'password.different' => 'The new password must be different from your current password.',
        ]);

        $user = Auth::user();
        $user->forceFill([
            'password' => Hash::make($validated['password']),
        ])->save();

        return redirect()->route('admin.dashboard')->with('success', 'Your password has been changed successfully.');
    }
}
