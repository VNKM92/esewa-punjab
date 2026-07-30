<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\PageContent;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $page = PageContent::query()->where('key', 'contact')->where('is_active', true)->first()
            ?? new PageContent([
                'key' => 'contact',
                'name' => 'Contact us',
                'meta_title' => 'Contact Us | MigraVerify Desk',
                'eyebrow' => 'Contact Support',
                'hero_title' => 'Have questions? Our support team is ready to assist.',
                'hero_description' => 'Reach out to the MigraVerify technical desk for portal integration, issuer onboarding, or verification assistance.',
            ]);

        return view('frontend.contact', compact('page'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thanks — your message has been sent to the MigraVerify team.');
    }
}
