@extends('layouts.app')

@section('title', $page->meta_title ?? 'EsewaPunjab | Secure Visa & Document Verification Portal')

@section('content')
{{-- Hero & Document Lookup Section --}}
<section id="verify" class="hero-grid relative isolate overflow-hidden bg-slate-950 text-white">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[600px] w-[1000px] -translate-x-1/2 blur-3xl opacity-30 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>
    
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 pb-20 pt-16 sm:px-6 sm:pb-24 sm:pt-20 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
        {{-- Hero Left Content --}}
        <div class="fade-in-up">
            <div class="mb-6 inline-flex items-center gap-2.5 rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-wide text-sky-300 shadow-sm backdrop-blur">
                <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>{{ $page->eyebrow ?? 'Official Document Assurance' }}</span>
            </div>
            
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl lg:leading-[1.08]">
                {!! nl2br(e($page->hero_title)) !!}
            </h1>
            
            <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                {{ $page->hero_description }}
            </p>
            
            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="{{ $page->cta_url ?: '#verification-form' }}" class="inline-flex items-center gap-2.5 rounded-2xl bg-sky-500 px-6 py-4 text-sm font-bold text-slate-950 shadow-lg shadow-sky-500/25 transition-all duration-200 hover:-translate-y-0.5 hover:bg-sky-400">
                    <span>{{ $page->cta_label ?: 'Start verification' }}</span>
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
                <a href="#how-it-works" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-4 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                    See how it works
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>

            <div class="mt-12 flex flex-wrap gap-x-8 gap-y-4 border-t border-white/10 pt-8 text-xs font-semibold uppercase tracking-wider text-slate-400">
                <span class="inline-flex items-center gap-2 text-slate-300">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                    256-Bit Encrypted
                </span>
                <span class="inline-flex items-center gap-2 text-slate-300">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                    Issuer Gate Control
                </span>
                <span class="inline-flex items-center gap-2 text-slate-300">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                    Instant Audit Log
                </span>
            </div>
        </div>

        {{-- Hero Right Orbit Card / Live Form --}}
        <div class="hero-orbit relative mx-auto w-full max-w-md lg:max-w-none">
            <div class="glass-panel relative rounded-3xl p-6 shadow-2xl sm:p-8">
                <div class="flex items-center justify-between border-b border-white/10 pb-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-500/20 text-sky-400 ring-1 ring-sky-500/30">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-sky-400">Live Verification Portal</p>
                            <p class="text-sm font-bold text-white">Check Document Reference</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-bold text-emerald-400 ring-1 ring-emerald-500/20">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Active Gateway
                    </span>
                </div>

                {{-- Form --}}
                <form id="verification-form" method="GET" action="{{ route('verify.lookup') }}" class="mt-6">
                    <label for="uuid" class="block text-sm font-bold text-slate-200">Document Reference Key (UUID)</label>
                    <p class="mt-1 text-xs text-slate-400">Enter the 36-character key from your official certificate or QR code.</p>
                    
                    <div class="mt-4 space-y-3">
                        <div class="relative">
                            <input id="uuid" 
                                   name="uuid" 
                                   value="{{ old('uuid') }}" 
                                   placeholder="e.g. 550e8400-e29b-41d4-a716-446655440000" 
                                   autocomplete="off" 
                                   required 
                                   class="w-full rounded-2xl border border-white/20 bg-slate-900/90 px-4 py-3.5 text-sm font-mono text-white placeholder:text-slate-500 focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-500/20">
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-sky-500 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-sky-500/25 transition-all duration-200 hover:bg-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-500/30">
                            Check Live Document Status
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </button>
                    </div>

                    @error('uuid')
                        <p class="mt-3 rounded-xl bg-rose-500/10 p-3 text-xs font-semibold text-rose-400 border border-rose-500/20">{{ $message }}</p>
                    @enderror
                </form>

                <div class="mt-6 grid grid-cols-3 divide-x divide-white/10 border-t border-white/10 pt-5 text-center text-xs">
                    <div class="px-2">
                        <svg class="mx-auto h-5 w-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20M4.9 4.9l14.2 14.2M19.1 4.9 4.9 19.1"/></svg>
                        <p class="mt-2 font-bold text-slate-300">QR Linked</p>
                    </div>
                    <div class="px-2">
                        <svg class="mx-auto h-5 w-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg>
                        <p class="mt-2 font-bold text-slate-300">Privacy Gated</p>
                    </div>
                    <div class="px-2">
                        <svg class="mx-auto h-5 w-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg>
                        <p class="mt-2 font-bold text-slate-300">Live Status</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Dynamic Stats Bar --}}
@php
    $stats = $page->sections['stats'] ?? [
        ['number' => '99.9%', 'label' => 'Verification Accuracy', 'desc' => 'Cryptographic hash matching'],
        ['number' => '150k+', 'label' => 'Records Processed', 'desc' => 'Trusted by global partners'],
        ['number' => '<0.5s', 'label' => 'Instant Status Check', 'desc' => 'Real-time database lookup'],
    ];
@endphp
<section class="border-y border-slate-200 bg-white">
    <div class="mx-auto grid max-w-7xl divide-y divide-slate-200 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
        @foreach ($stats as $stat)
            <div class="p-6 text-center sm:p-8">
                <p class="text-3xl font-extrabold text-slate-950 sm:text-4xl">{{ $stat['number'] ?? '' }}</p>
                <p class="mt-1 text-sm font-bold text-sky-700">{{ $stat['label'] ?? '' }}</p>
                <p class="mt-1 text-xs text-slate-500">{{ $stat['desc'] ?? '' }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- How It Works --}}
@php
    $steps = $page->sections['steps'] ?? [
        ['step' => '01', 'title' => 'Scan or enter reference', 'desc' => 'Scan the document QR code or paste the official 36-character UUID token.'],
        ['step' => '02', 'title' => 'Pass security check', 'desc' => 'Complete a anti-bot verification challenge to protect personal identity records.'],
        ['step' => '03', 'title' => 'Review live status', 'desc' => 'Instantly confirm document authenticity, active state, and expiry details.'],
    ];
@endphp
<section id="how-it-works" class="scroll-mt-24 bg-slate-50 py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600">Verification Steps</p>
            <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">A clear, 3-step verification workflow.</h2>
            <p class="mt-4 text-base text-slate-600">Designed to deliver verified results in seconds without exposing unnecessary personal data.</p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach ($steps as $step)
                <article class="group relative rounded-3xl border border-slate-200/90 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-sky-300 hover:shadow-xl hover:shadow-sky-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-50 text-base font-black text-sky-700 ring-1 ring-sky-100 transition-colors group-hover:bg-sky-600 group-hover:text-white">
                        {{ $step['step'] ?? '0' }}
                    </span>
                    <h3 class="mt-6 text-xl font-bold text-slate-950">{{ $step['title'] ?? '' }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $step['desc'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Document Workflows Grid --}}
<section id="documents" class="scroll-mt-24 bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600">Document Workflows</p>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Trusted across global mobility & visa records.</h2>
            </div>
            <p class="max-w-md text-sm text-slate-600">QR-linked status verification ensures smooth handoffs for educational institutions, employers, and immigration agencies.</p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            <div class="group rounded-3xl border border-slate-200 p-8 transition-all duration-300 hover:-translate-y-1 hover:border-sky-300 hover:shadow-xl hover:shadow-sky-900/5">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-sky-600 transition group-hover:bg-sky-600 group-hover:text-white">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M8 3v4M16 3v4M4 9h16M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="M8 13h3M8 17h7"/></svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-slate-950">Civil & Identity Certificates</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Official marriage, birth, and relationship certificates verified for residency and dependent visa filings.</p>
            </div>

            <div class="group rounded-3xl border border-slate-200 p-8 transition-all duration-300 hover:-translate-y-1 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-900/5">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 3h10l3 4v14H4V7l3-4Z"/><path d="M8 12h8M8 16h5"/></svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-slate-950">Work Permits & Sponsorships</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Employment authorization letters and sponsorship approvals verified directly by employer HR desks.</p>
            </div>

            <div class="group rounded-3xl border border-slate-200 p-8 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-900/5">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition group-hover:bg-emerald-600 group-hover:text-white">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 9h5M7 13h9M16 9h1"/></svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-slate-950">Academic & Embassy Evidence</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Transcripts, enrollment verifications, and embassy endorsement letters with real-time status control.</p>
            </div>
        </div>
    </div>
</section>

{{-- Security Pillars --}}
@php
    $security = $page->sections['security'] ?? [
        ['title' => 'Controlled access lifecycle', 'desc' => 'Document issuers can activate, pause, or expire access tokens anytime.'],
        ['title' => 'Privacy-first design', 'desc' => 'Sensitive identity files are locked behind security gates.'],
        ['title' => 'Audit-ready trail', 'desc' => 'Timestamped verification records prevent counterfeit or altered submissions.'],
    ];
@endphp
<section id="security" class="scroll-mt-24 bg-slate-950 py-20 text-white sm:py-28">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
        <div>
            <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-400">Security Architecture</p>
            <h2 class="mt-3 text-3xl font-extrabold tracking-tight sm:text-4xl">Protection by design. Zero unverified exposure.</h2>
            <p class="mt-5 text-base leading-7 text-slate-300">EsewaPunjab ensures that verification confirms active status without leaking sensitive data into public search indexes.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            @foreach ($security as $sec)
                <div class="glass-panel rounded-2xl p-6 sm:col-span-{{ $loop->last && $loop->count % 2 != 0 ? '2' : '1' }}">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/20 text-sky-400 ring-1 ring-sky-500/30">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/></svg>
                    </div>
                    <h3 class="mt-4 font-bold text-white">{{ $sec['title'] ?? '' }}</h3>
                    <p class="mt-2 text-xs leading-5 text-slate-300">{{ $sec['desc'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Latest Insights Preview --}}
<section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600">Migration Insights</p>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Latest articles & guidance desk.</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-sky-600 hover:text-slate-950">
                View all insights
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @forelse ($latestPosts as $post)
                <article class="group relative flex flex-col justify-between rounded-3xl border border-slate-200 bg-slate-50/50 p-6 transition-all duration-300 hover:-translate-y-1 hover:border-sky-300 hover:bg-white hover:shadow-xl hover:shadow-slate-900/5">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-sky-700">
                            <span>{{ $post->category }}</span>
                            <span class="text-slate-400">{{ $post->read_time }}</span>
                        </div>
                        <h3 class="mt-4 text-lg font-bold tracking-tight text-slate-950 group-hover:text-sky-700">
                            <a href="{{ route('posts.show', $post) }}" class="after:absolute after:inset-0">{{ $post->title }}</a>
                        </h3>
                        <p class="mt-3 text-xs leading-6 text-slate-600 line-clamp-3">{{ $post->excerpt }}</p>
                    </div>
                    <div class="mt-6 flex items-center gap-2 text-xs font-bold text-sky-700">
                        Read insight
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </div>
                </article>
            @empty
                <p class="text-sm text-slate-500">No migration insights published yet.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- FAQ Accordion --}}
@php
    $faqs = $page->sections['faqs'] ?? [
        ['q' => 'Where do I find the document reference?', 'a' => 'The 36-character reference key is printed on official EsewaPunjab certificates and embedded within the official QR code.'],
        ['q' => 'Why is a security question required?', 'a' => 'The security challenge prevents automated web scrapers from harvesting sensitive applicant details.'],
        ['q' => 'What if a document displays an inactive status?', 'a' => 'An inactive status indicates the issuing authority has paused or expired access. Please contact the issuing institution directly.'],
    ];
@endphp
<section id="faq" class="scroll-mt-24 bg-slate-50 py-20 sm:py-28" x-data="{ active: 0 }">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16 lg:px-8">
        <div>
            <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600">Help Desk</p>
            <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Frequently Asked Questions</h2>
            <p class="mt-4 text-sm leading-6 text-slate-600">Find quick answers about document reference checking, access security, and status meanings.</p>
        </div>

        <div class="space-y-4">
            @foreach ($faqs as $index => $faq)
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white transition shadow-xs">
                    <button x-on:click="active = (active === {{ $index }} ? null : {{ $index }})" 
                            type="button"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left text-base font-bold text-slate-950 focus:outline-none">
                        <span>{{ $faq['q'] ?? '' }}</span>
                        <svg class="h-5 w-5 shrink-0 text-slate-400 transition-transform duration-200" 
                             :class="{ 'rotate-180 text-sky-600': active === {{ $index }} }" 
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div x-show="active === {{ $index }}" x-cloak x-transition class="border-t border-slate-100 px-6 pb-6 pt-4 text-sm leading-6 text-slate-600">
                        {{ $faq['a'] ?? '' }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
