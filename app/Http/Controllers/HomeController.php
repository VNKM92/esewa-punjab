<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $page = PageContent::query()->where('key', 'home')->where('is_active', true)->first()
            ?? new PageContent([
                'key' => 'home',
                'name' => 'Landing page',
                'meta_title' => 'MigraVerify | Secure Visa & Document Verification Portal',
                'eyebrow' => 'Official Document Assurance',
                'hero_title' => 'Verify migration credentials with speed, clarity, and trust.',
                'hero_description' => 'MigraVerify provides institutions, employers, and applicants an instant, encrypted verification engine for QR-linked visa and migration records.',
                'cta_label' => 'Verify document now',
                'cta_url' => '/#verification-form',
            ]);

        return view('frontend.home', [
            'page' => $page,
            'latestPosts' => Post::published()->latest('published_at')->take(3)->get(),
        ]);
    }
}
