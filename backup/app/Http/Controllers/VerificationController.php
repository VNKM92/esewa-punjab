<?php

namespace App\Http\Controllers;

use App\Models\VerificationDocument;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function lookup(Request $request)
    {
        $validated = $request->validate([
            'uuid' => ['required', 'uuid'],
        ]);

        return redirect()->route('verify.captcha', $validated['uuid']);
    }

    public function showCaptcha($uuid)
    {
        $doc = VerificationDocument::where('uuid', $uuid)->firstOrFail();

        if (! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
            return response()->view('errors.document_expired', [], 403);
        }

        return view('frontend.verify_captcha', compact('doc'));
    }

    public function verifyAndAccess(Request $request, $uuid)
    {
        $request->validate([
            'captcha_input' => 'required',
        ]);

        $doc = VerificationDocument::where('uuid', $uuid)->firstOrFail();

        if (! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
            return response()->view('errors.document_expired', [], 403);
        }

        // Simple Math Captcha verification check from session
        if ($request->captcha_input != session('captcha_result')) {
            return back()->withErrors(['captcha' => 'Invalid Captcha answer. Please try again.']);
        }

        // Increment scan view count dynamically
        $doc->increment('view_count');

        return view('frontend.view_document', compact('doc'));
    }
}
