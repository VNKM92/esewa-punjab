@extends('layouts.app')

@section('title', 'Document Link Expired | MigraVerify')

@section('content')
<section class="hero-grid relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-slate-950 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-amber-500 to-rose-600"></div>

    <div class="mx-auto max-w-xl text-center fade-in-up">
        {{-- Large Floating Icon --}}
        <div class="relative mx-auto flex items-center justify-center">
            <div class="flex h-24 w-24 items-center justify-center rounded-3xl bg-amber-500/20 text-amber-400 ring-1 ring-amber-500/30 backdrop-blur-xl shadow-2xl shadow-amber-500/20">
                <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01"/><path d="m10.3 3.8-7 12.1A2 2 0 0 0 5 19h14a2 2 0 0 0 1.7-3.1l-7-12.1a2 2 0 0 0-3.4 0Z"/></svg>
            </div>
        </div>

        <div class="mt-8">
            <div class="inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-amber-300 backdrop-blur">
                Document Unavailable
            </div>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">This link can’t be opened.</h1>
            <p class="mt-3 text-base leading-7 text-slate-300">
                The document verification reference may have expired, been deactivated by its issuing authority, or the reference UUID may be invalid.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('home') }}#verification-form" class="inline-flex items-center gap-2 rounded-2xl bg-amber-500 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-amber-500/25 transition hover:bg-amber-400">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Try Another Reference
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                Contact Issuer Support
            </a>
        </div>
    </div>
</section>
@endsection
