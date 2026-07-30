@extends('layouts.app')

@section('title', '419 Page Expired | MigraVerify')

@section('content')
<section class="hero-grid relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-slate-950 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>

    <div class="mx-auto max-w-xl text-center fade-in-up">
        {{-- Large Floating Error Code --}}
        <div class="relative mx-auto flex items-center justify-center">
            <span class="select-none text-8xl font-black tracking-widest text-white/10 sm:text-9xl">419</span>
            <div class="absolute flex h-20 w-20 items-center justify-center rounded-3xl bg-sky-500/20 text-sky-400 ring-1 ring-sky-500/30 backdrop-blur-xl shadow-2xl shadow-sky-500/20">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
        </div>

        <div class="mt-8">
            <div class="inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-sky-300 backdrop-blur">
                Session Expired
            </div>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Security Token Timed Out</h1>
            <p class="mt-3 text-base leading-7 text-slate-300">
                Your portal session has expired for safety reasons. Please refresh the page and resubmit your form or verification lookup.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="javascript:location.reload()" class="inline-flex items-center gap-2 rounded-2xl bg-sky-500 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-sky-500/25 transition hover:bg-sky-400">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                Refresh Session
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                Return Home
            </a>
        </div>
    </div>
</section>
@endsection
