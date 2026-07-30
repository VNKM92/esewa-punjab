@extends('layouts.app')

@section('title', '404 Page Not Found | MigraVerify')

@section('content')
<section class="hero-grid relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-slate-950 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>

    <div class="mx-auto max-w-xl text-center fade-in-up">
        {{-- Large Floating Error Code --}}
        <div class="relative mx-auto flex items-center justify-center">
            <span class="select-none text-8xl font-black tracking-widest text-white/10 sm:text-9xl">404</span>
            <div class="absolute flex h-20 w-20 items-center justify-center rounded-3xl bg-sky-500/20 text-sky-400 ring-1 ring-sky-500/30 backdrop-blur-xl shadow-2xl shadow-sky-500/20">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/><path d="M11 8v6M8 11h6"/></svg>
            </div>
        </div>

        <div class="mt-8">
            <div class="inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-sky-300 backdrop-blur">
                Page Not Found
            </div>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Looking for a migration record or page?</h1>
            <p class="mt-3 text-base leading-7 text-slate-300">
                The address you entered might be incorrect, moved, or the page no longer exists on the MigraVerify portal.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-2xl bg-sky-500 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-sky-500/25 transition hover:bg-sky-400">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Return to Homepage
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                Contact Desk
            </a>
        </div>
    </div>
</section>
@endsection
