<?php

namespace App\Http\Controllers;

use App\Models\VerificationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'documents' => VerificationDocument::latest()->get(),
        ]);
    }

    public function storeDocument(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'applicant_name' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'string', 'max:100'],
            'document' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
            'expires_at' => ['nullable', 'date'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $path = $request->file('document')->store('verified_docs', 'public');

        VerificationDocument::create([
            'uuid' => (string) Str::uuid(),
            'title' => $validated['title'],
            'applicant_name' => $validated['applicant_name'],
            'document_type' => $validated['document_type'],
            'file_path' => $path,
            'is_active' => $request->boolean('is_active', true),
            'expires_at' => $validated['expires_at'] ?? null,
        ]);

        return back()->with('success', 'Document uploaded and its verification reference has been created.');
    }

    public function toggleVisibility(int $id)
    {
        $document = VerificationDocument::findOrFail($id);
        $document->update(['is_active' => ! $document->is_active]);

        return back()->with('success', 'Document visibility updated.');
    }
}
