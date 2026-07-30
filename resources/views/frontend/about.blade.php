@extends('layouts.app')

@section('title', $page->meta_title ?? 'About EsewaPunjab | Building Trust in Global Mobility')

@section('content')
{{-- Hero --}}
<section class="hero-grid relative isolate overflow-hidden bg-slate-950 py-20 text-white sm:py-28">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center fade-in-up">
        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-wide text-sky-300 backdrop-blur">
            <span>{{ $page->eyebrow ?? 'About EsewaPunjab' }}</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ $page->hero_title }}
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-300">
            {{ $page->hero_description }}
        </p>
    </div>
</section>

{{-- Main Content & Pillars --}}
<section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12 lg:items-start">
            {{-- Left: Body text --}}
            <div class="lg:col-span-7">
                <h2 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">Our Mission & Approach</h2>
                <div class="mt-6 space-y-6 text-base leading-8 text-slate-600 whitespace-pre-line">
                    {{ $page->body }}
                </div>
            </div>

            {{-- Right: Card Highlight --}}
            <div class="lg:col-span-5">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm sm:p-10">
                    <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600">Why EsewaPunjab</p>
                    <h3 class="mt-3 text-2xl font-bold tracking-tight text-slate-950">A trusted handoff between applicants, issuers & verifiers.</h3>
                    <p class="mt-4 text-sm leading-6 text-slate-600">Eliminating paper certificate forgery and manual verification delays with cryptographic status checks.</p>
                    
                    @if ($page->cta_label)
                        <a href="{{ $page->cta_url ?: route('home') }}" class="mt-8 inline-flex items-center gap-2 rounded-2xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-md transition hover:bg-sky-600">
                            {{ $page->cta_label }}
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Core Pillars Grid --}}
        @php
            $pillars = $page->sections['pillars'] ?? [
                ['title' => 'Issuer Control', 'desc' => 'Only the certified issuing body holds full authority over document access.'],
                ['title' => 'Privacy Assurance', 'desc' => 'Applicant identity data is protected with end-to-end security protocols.'],
                ['title' => 'Global Accessibility', 'desc' => 'Available 24/7 across any browser or device without complex software installs.'],
            ];
        @endphp
        <div class="mt-20 border-t border-slate-200 pt-16">
            <p class="text-xs font-extrabold uppercase tracking-[0.2em] text-sky-600 text-center">Core Foundations</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950 text-center">The pillars behind our verification network</h2>
            
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($pillars as $pillar)
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xs transition hover:border-sky-300 hover:shadow-lg">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/></svg>
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-slate-950">{{ $pillar['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $pillar['desc'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
