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

        $doc = VerificationDocument::where('uuid', $validated['uuid'])->first();

        if (! $doc || ! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
            return response()->view('errors.document_expired', [], 403);
        }

        return redirect()->route('verify.captcha', $doc->uuid);
    }

    public function showCaptcha($uuid)
    {
        $doc = VerificationDocument::where('uuid', $uuid)->first();

        if (! $doc || ! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
            return response()->view('errors.document_expired', [], 403);
        }

        return view('frontend.verify_captcha', compact('doc'));
    }

    public function verifyAndAccess(Request $request, $uuid)
    {
        $request->validate([
            'captcha_input' => 'required',
        ]);

        $doc = VerificationDocument::where('uuid', $uuid)->first();

        if (! $doc || ! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
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

    public function streamFile($uuid)
    {
        $doc = VerificationDocument::where('uuid', $uuid)->first();

        if (! $doc || ! $doc->is_active || ($doc->expires_at && $doc->expires_at->isPast())) {
            return response()->view('errors.document_expired', [], 403);
        }

        $path = storage_path('app/public/' . $doc->file_path);

        if (! file_exists($path)) {
            $altPath = storage_path('app/' . $doc->file_path);
            if (file_exists($altPath)) {
                $path = $altPath;
            } else {
                abort(404, 'Document file not found on server.');
            }
        }

        $mimeType = mime_content_type($path) ?: 'application/octet-stream';

        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($doc->file_path) . '"',
        ]);
    }
}
