<?php

namespace App\Http\Controllers;

use App\Models\PageContent;

class PageController extends Controller
{
    public function about()
    {
        return view('frontend.about', ['page' => $this->page('about')]);
    }

    public function terms()
    {
        return view('frontend.terms', ['page' => $this->page('terms')]);
    }

    protected function page(string $key): PageContent
    {
        return PageContent::query()
            ->where('key', $key)
            ->where('is_active', true)
            ->first() ?? new PageContent([
                'key' => $key,
                'name' => ucfirst($key),
                'meta_title' => ucfirst($key) . ' | MigraVerify',
                'eyebrow' => ucfirst($key),
                'hero_title' => ucfirst($key) . ' information',
                'hero_description' => 'Guidelines and information regarding ' . $key . '.',
            ]);
    }
}
