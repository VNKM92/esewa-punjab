@extends('layouts.app')

@section('title', $page->meta_title ?? 'Migration Insights & Guides | MigraVerify')

@section('content')
{{-- Hero --}}
<section class="hero-grid relative isolate overflow-hidden bg-slate-950 py-20 text-white sm:py-28">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center fade-in-up">
        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-wide text-sky-300 backdrop-blur">
            <span>{{ $page->eyebrow ?? 'Knowledge Desk' }}</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ $page->hero_title }}
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-300">
            {{ $page->hero_description }}
        </p>

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('posts.index') }}" class="mx-auto mt-10 max-w-xl">
            <div class="relative flex items-center">
                <input type="text" 
                       name="q" 
                       value="{{ $searchQuery }}" 
                       placeholder="Search insights (e.g. residency, work permit, QR security)..." 
                       class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-4 pl-12 text-sm text-white placeholder:text-slate-400 backdrop-blur outline-none transition focus:border-sky-400 focus:bg-slate-900/90 focus:ring-4 focus:ring-sky-500/20">
                <svg class="absolute left-4 h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                @if ($activeCategory)
                    <input type="hidden" name="category" value="{{ $activeCategory }}">
                @endif
                <button type="submit" class="absolute right-2 rounded-xl bg-sky-500 px-4 py-2.5 text-xs font-bold text-slate-950 transition hover:bg-sky-400">Search</button>
            </div>
        </form>
    </div>
</section>

{{-- Articles Listing & Filters --}}
<section class="bg-slate-50 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Category Filter Pills --}}
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200 pb-8">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('posts.index', array_filter(['q' => $searchQuery])) }}" 
                   class="rounded-full px-4 py-2 text-xs font-bold transition {{ !$activeCategory ? 'bg-slate-950 text-white shadow-sm' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100' }}">
                    All Insights
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('posts.index', array_filter(['category' => $cat, 'q' => $searchQuery])) }}" 
                       class="rounded-full px-4 py-2 text-xs font-bold transition {{ $activeCategory === $cat ? 'bg-sky-600 text-white shadow-sm' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            @if ($searchQuery || $activeCategory)
                <a href="{{ route('posts.index') }}" class="text-xs font-bold text-rose-600 hover:underline">Clear filters &times;</a>
            @endif
        </div>

        {{-- Featured Article Spotlight (if page 1 and no filter active) --}}
        @if (!$searchQuery && !$activeCategory && $featuredPost && $posts->currentPage() === 1)
            <div class="mt-10 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-900/5 lg:grid lg:grid-cols-12">
                <div class="p-8 sm:p-12 lg:col-span-8 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 text-xs font-extrabold uppercase tracking-wider text-sky-700">
                            <span class="rounded-full bg-sky-50 px-3 py-1 text-sky-700">Featured Guide</span>
                            <span>{{ $featuredPost->category }}</span>
                            <span>&bull;</span>
                            <span class="text-slate-400">{{ $featuredPost->read_time }}</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">
                            <a href="{{ route('posts.show', $featuredPost) }}" class="hover:text-sky-600 transition">{{ $featuredPost->title }}</a>
                        </h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ $featuredPost->excerpt }}</p>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('posts.show', $featuredPost) }}" class="inline-flex items-center gap-2 text-sm font-bold text-sky-600 hover:text-slate-950">
                            Read full article
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                    </div>
                </div>
                <div class="bg-slate-950 p-8 text-white lg:col-span-4 flex flex-col justify-center border-t border-slate-800 lg:border-t-0 lg:border-l">
                    <p class="text-xs font-bold uppercase tracking-wider text-sky-400">MigraVerify Knowledge</p>
                    <p class="mt-2 text-lg font-bold text-white">Document Assurance & Security</p>
                    <p class="mt-2 text-xs text-slate-400 leading-5">Stay informed with best practices for handling visa credentials and verifying official documents securely.</p>
                </div>
            </div>
        @endif

        {{-- Posts Grid --}}
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article class="group relative flex flex-col justify-between rounded-3xl border border-slate-200 bg-white p-7 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-sky-300 hover:shadow-xl hover:shadow-slate-900/5">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-sky-700">
                            <span class="rounded-lg bg-sky-50 px-2.5 py-1">{{ $post->category }}</span>
                            <span class="text-slate-400">{{ $post->read_time }}</span>
                        </div>
                        <h2 class="mt-5 text-xl font-bold tracking-tight text-slate-950 group-hover:text-sky-600 transition">
                            <a href="{{ route('posts.show', $post) }}" class="after:absolute after:inset-0">{{ $post->title }}</a>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-slate-600 line-clamp-3">{{ $post->excerpt }}</p>
                    </div>
                    <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-bold text-slate-500">
                        <span>{{ $post->published_at?->format('M d, Y') }}</span>
                        <span class="flex items-center gap-1 text-sky-600 group-hover:translate-x-1 transition-transform">
                            Read article &rarr;
                        </span>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-slate-200 bg-white p-12 text-center">
                    <svg class="mx-auto h-10 w-10 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <p class="mt-4 text-base font-bold text-slate-900">No migration insights found</p>
                    <p class="mt-1 text-sm text-slate-500">Try adjusting your search criteria or category filter.</p>
                    <a href="{{ route('posts.index') }}" class="mt-6 inline-flex rounded-xl bg-slate-950 px-4 py-2.5 text-xs font-bold text-white">Reset search filters</a>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
