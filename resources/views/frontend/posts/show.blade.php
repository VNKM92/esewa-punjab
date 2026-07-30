@extends('layouts.app')

@section('title', $post->title.' | MigraVerify Insights')

@section('content')
<article class="bg-slate-50 py-16 sm:py-24">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 transition hover:text-sky-600">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m15 18-6-6 6-6"/></svg>
            All Migration Insights
        </a>

        {{-- Main Article Card --}}
        <div class="mt-8 rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-900/5 sm:p-12">
            <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-wider text-sky-700">
                <span class="rounded-full bg-sky-50 px-3 py-1 text-sky-700">{{ $post->category }}</span>
                <span class="text-slate-300">•</span>
                <span class="text-slate-500">{{ $post->read_time }}</span>
                <span class="text-slate-300">•</span>
                <span class="text-slate-500">Published {{ $post->published_at?->format('M d, Y') }}</span>
            </div>

            <h1 class="mt-6 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl lg:text-5xl leading-tight">
                {{ $post->title }}
            </h1>

            <div class="mt-6 rounded-2xl border-l-4 border-sky-500 bg-sky-50/50 p-5 text-base leading-7 font-medium text-sky-950">
                {{ $post->excerpt }}
            </div>

            <div class="mt-10 space-y-6 text-base leading-8 text-slate-700 whitespace-pre-line border-t border-slate-100 pt-8">
                {!! nl2br(e($post->content)) !!}
            </div>

            {{-- Document Verification Reminder Callout --}}
            <div class="mt-12 flex items-start gap-4 rounded-2xl border border-sky-200 bg-sky-50 p-6 text-sm text-sky-950">
                <svg class="h-6 w-6 shrink-0 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg>
                <div>
                    <span class="font-bold text-sky-950">Official Document Verification Note:</span>
                    <p class="mt-1 leading-6 text-sky-900">Always verify migration credentials using official UUID references supplied by certified issuing bodies. Avoid trusting static unverified attachments.</p>
                </div>
            </div>
        </div>

        {{-- Related Insights --}}
        @if (isset($relatedPosts) && $relatedPosts->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-2xl font-extrabold tracking-tight text-slate-950">Related Migration Insights</h2>
                <div class="mt-6 grid gap-6 md:grid-cols-3">
                    @foreach ($relatedPosts as $related)
                        <article class="group relative flex flex-col justify-between rounded-3xl border border-slate-200 bg-white p-6 shadow-xs transition hover:-translate-y-1 hover:border-sky-300 hover:shadow-lg">
                            <div>
                                <span class="text-xs font-bold uppercase text-sky-700">{{ $related->category }}</span>
                                <h3 class="mt-3 text-base font-bold text-slate-950 group-hover:text-sky-600">
                                    <a href="{{ route('posts.show', $related) }}" class="after:absolute after:inset-0">{{ $related->title }}</a>
                                </h3>
                            </div>
                            <div class="mt-4 text-xs font-bold text-sky-600 flex items-center gap-1">
                                Read insight &rarr;
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection
