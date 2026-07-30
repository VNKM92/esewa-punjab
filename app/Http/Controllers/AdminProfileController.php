<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Show the profile edit form for the logged-in admin.
     */
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update admin profile details and selfie avatar.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'selfie' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        if ($request->boolean('remove_selfie')) {
            if ($user->selfie_path && Storage::disk('public')->exists($user->selfie_path)) {
                Storage::disk('public')->delete($user->selfie_path);
            }
            $validated['selfie_path'] = null;
        } elseif ($request->hasFile('selfie')) {
            if ($user->selfie_path && Storage::disk('public')->exists($user->selfie_path)) {
                Storage::disk('public')->delete($user->selfie_path);
            }
            $path = $request->file('selfie')->store('selfies', 'public');
            $validated['selfie_path'] = $path;
        }

        $user->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile details and backend selfie updated successfully.');
    }
}
