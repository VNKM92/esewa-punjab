<?php

namespace App\Http\Controllers;

use App\Models\NavigationItem;
use App\Models\PageContent;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function index()
    {
        return view('admin.content.index', [
            'pages' => PageContent::orderBy('name')->get(),
            'navigationItems' => NavigationItem::orderBy('sort_order')->get(),
        ]);
    }

    public function editPage(PageContent $page)
    {
        return view('admin.content.page-editor', compact('page'));
    }

    public function updatePage(Request $request, PageContent $page)
    {
        $validated = $request->validate([
            'meta_title' => ['nullable', 'string', 'max:255'],
            'eyebrow' => ['nullable', 'string', 'max:100'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string', 'max:1000'],
            'body' => ['nullable', 'string', 'max:12000'],
            'cta_label' => ['nullable', 'string', 'max:80'],
            'cta_url' => ['nullable', 'string', 'max:255'],
            'sections_json' => ['nullable', 'string'],
        ]);

        if ($request->has('sections_json')) {
            $jsonStr = trim($request->input('sections_json') ?? '');
            if ($jsonStr !== '') {
                $decoded = json_decode($jsonStr, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $validated['sections'] = $decoded;
                }
            } else {
                $validated['sections'] = null;
            }
        }
        unset($validated['sections_json']);

        $page->update($validated + ['is_active' => $request->boolean('is_active')]);

        return redirect()->route('admin.content.index')->with('success', $page->name.' content has been updated.');
    }

    public function storeNavigation(Request $request)
    {
        NavigationItem::create($this->navigationData($request));

        return back()->with('success', 'Navigation item added.');
    }

    public function updateNavigation(Request $request, NavigationItem $navigationItem)
    {
        $navigationItem->update($this->navigationData($request));

        return back()->with('success', 'Navigation item updated.');
    }

    public function destroyNavigation(NavigationItem $navigationItem)
    {
        $navigationItem->delete();

        return back()->with('success', 'Navigation item removed.');
    }

    protected function navigationData(Request $request): array
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:50'],
            'url' => ['required', 'string', 'max:255', 'regex:/^(\/|https?:\/\/)/'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);

        return $validated + ['is_active' => $request->boolean('is_active')];
    }
}
