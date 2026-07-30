<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->latest('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $categories = Post::published()->distinct()->pluck('category')->filter()->values();
        $featuredPost = Post::published()->latest('published_at')->first();

        $page = PageContent::query()->where('key', 'insights')->where('is_active', true)->first()
            ?? new PageContent([
                'key' => 'insights',
                'name' => 'Migration insights',
                'meta_title' => 'Migration Insights & Verification Guides | MigraVerify',
                'eyebrow' => 'Knowledge Desk',
                'hero_title' => 'Expert guides for migration documents and compliance.',
                'hero_description' => 'Actionable insights, security tips, and compliance updates for visa applicants, employers, and immigration advisors.',
            ]);

        return view('frontend.posts.index', [
            'page' => $page,
            'posts' => $query->paginate(9)->withQueryString(),
            'categories' => $categories,
            'featuredPost' => $featuredPost,
            'activeCategory' => $request->input('category'),
            'searchQuery' => $request->input('q'),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->published_at?->isPast(), 404);

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->take(3)
            ->get();

        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        }

        return view('frontend.posts.show', compact('post', 'relatedPosts'));
    }
}
