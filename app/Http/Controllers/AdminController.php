<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\PageView;
use App\Models\VerificationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $dailyTraffic = collect(range(6, 0))->map(function (int $daysAgo): array {
            $date = now()->subDays($daysAgo)->toDateString();
            $views = PageView::query()->whereDate('created_at', $date);

            return [
                'label' => now()->subDays($daysAgo)->format('D'),
                'visits' => (clone $views)->count(),
                'unique' => (clone $views)->distinct('ip_address')->count('ip_address'),
            ];
        });

        return view('admin.dashboard', [
            'documents' => VerificationDocument::latest()->get(),
            'totalDocuments' => VerificationDocument::count(),
            'activeDocuments' => VerificationDocument::where('is_active', true)->count(),
            'totalScans' => VerificationDocument::sum('view_count'),
            'totalVisits' => PageView::count(),
            'uniqueVisitors' => PageView::distinct('ip_address')->count('ip_address'),
            'dailyTraffic' => $dailyTraffic,
            'trafficPeak' => max(1, $dailyTraffic->max('visits')),
            'recentViews' => PageView::latest()->take(6)->get(),
            'totalInquiries' => ContactMessage::count(),
            'recentMessages' => ContactMessage::latest()->take(4)->get(),
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

    public function destroyMessage(int $id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Inquiry message removed.');
    }
}
