@extends('layouts.app')

@section('title', $page->meta_title ?? 'Terms of Use & Privacy Standards | EsewaPunjab')

@section('content')
{{-- Hero --}}
<section class="hero-grid relative isolate overflow-hidden bg-slate-950 py-20 text-white sm:py-28">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center fade-in-up">
        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-wide text-sky-300 backdrop-blur">
            <span>{{ $page->eyebrow ?? 'Legal Standards' }}</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ $page->hero_title }}
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-300">
            {{ $page->hero_description }}
        </p>
    </div>
</section>

{{-- Content & Policy List --}}
<section class="bg-slate-50 py-20 sm:py-28">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-900/5 sm:p-12">
            <h2 class="text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Terms of Service Overview</h2>
            
            <div class="mt-6 space-y-6 text-base leading-8 text-slate-700 whitespace-pre-line border-b border-slate-100 pb-10">
                {{ $page->body }}
            </div>

            @php
                $termsList = $page->sections['terms_list'] ?? [
                    ['title' => '1. Scope of Verification', 'desc' => 'EsewaPunjab acts as an intermediary verification gateway confirming the live state of issuer records.'],
                    ['title' => '2. User Compliance', 'desc' => 'Verifiers must maintain confidentiality of checked records and refrain from improper redistribution.'],
                    ['title' => '3. Service Availability', 'desc' => 'We strive for 99.9% uptime for verification lookups worldwide.']
                ];
            @endphp

            <div class="mt-10 space-y-6">
                <h3 class="text-lg font-bold text-slate-950">Detailed Regulatory Clauses</h3>
                <div class="grid gap-4">
                    @foreach ($termsList as $clause)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-6">
                            <h4 class="font-bold text-slate-900">{{ $clause['title'] ?? '' }}</h4>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $clause['desc'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($page->cta_label)
                <div class="mt-10 pt-8 border-t border-slate-100 flex items-center justify-between gap-4">
                    <p class="text-xs text-slate-500">Need specific compliance or legal clarification?</p>
                    <a href="{{ $page->cta_url ?: route('contact') }}" class="inline-flex rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-sky-600">
                        {{ $page->cta_label }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
