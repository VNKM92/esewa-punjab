<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    /**
     * Show site branding, dynamic logo & slogan management form.
     */
    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => SiteSetting::getSettings(),
        ]);
    }

    /**
     * Update dynamic logo image, logo content, and slogan.
     */
    public function update(Request $request)
    {
        $settings = SiteSetting::getSettings();

        $validated = $request->validate([
            'logo_text' => ['required', 'string', 'max:100'],
            'logo_text_highlight' => ['nullable', 'string', 'max:100'],
            'slogan' => ['required', 'string', 'max:255'],
            'site_title' => ['required', 'string', 'max:255'],
            'footer_description' => ['nullable', 'string', 'max:1000'],
            'logo_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ]);

        if ($request->boolean('remove_logo')) {
            if ($settings->logo_image_path && Storage::disk('public')->exists($settings->logo_image_path)) {
                Storage::disk('public')->delete($settings->logo_image_path);
            }
            $validated['logo_image_path'] = null;
        } elseif ($request->hasFile('logo_image')) {
            if ($settings->logo_image_path && Storage::disk('public')->exists($settings->logo_image_path)) {
                Storage::disk('public')->delete($settings->logo_image_path);
            }
            $path = $request->file('logo_image')->store('logos', 'public');
            $validated['logo_image_path'] = $path;
        }

        $settings->update($validated);

        return redirect()->route('admin.settings.edit')->with('success', 'Dynamic logo, brand content, and slogan have been updated.');
    }
}
