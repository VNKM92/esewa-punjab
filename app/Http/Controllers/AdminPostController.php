<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest('published_at')->get()]);
    }

    public function create()
    {
        return view('admin.posts.editor', ['post' => new Post()]);
    }

    public function store(Request $request)
    {
        $post = Post::create($this->postData($request));

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Migration insight created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.editor', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->postData($request, $post));

        return back()->with('success', 'Migration insight updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Migration insight deleted.');
    }

    protected function postData(Request $request, ?Post $post = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string', 'max:20000'],
            'category' => ['required', 'string', 'max:100'],
            'read_time' => ['required', 'string', 'max:30'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);

        return $validated;
    }
}
