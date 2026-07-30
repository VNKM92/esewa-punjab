@extends('layouts.app')

@section('title', '500 Server Error | MigraVerify')

@section('content')
<section class="hero-grid relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-slate-950 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-rose-500 to-indigo-600"></div>

    <div class="mx-auto max-w-xl text-center fade-in-up">
        {{-- Large Floating Error Code --}}
        <div class="relative mx-auto flex items-center justify-center">
            <span class="select-none text-8xl font-black tracking-widest text-white/10 sm:text-9xl">500</span>
            <div class="absolute flex h-20 w-20 items-center justify-center rounded-3xl bg-rose-500/20 text-rose-400 ring-1 ring-rose-500/30 backdrop-blur-xl shadow-2xl shadow-rose-500/20">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01"/><path d="m10.3 3.8-7 12.1A2 2 0 0 0 5 19h14a2 2 0 0 0 1.7-3.1l-7-12.1a2 2 0 0 0-3.4 0Z"/></svg>
            </div>
        </div>

        <div class="mt-8">
            <div class="inline-flex items-center gap-2 rounded-full border border-rose-500/30 bg-rose-500/10 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-rose-300 backdrop-blur">
                System Encountered An Issue
            </div>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Unexpected Server Error</h1>
            <p class="mt-3 text-base leading-7 text-slate-300">
                Our technical system experienced a momentary glitch while processing your request. Please try refreshing or returning shortly.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="javascript:location.reload()" class="inline-flex items-center gap-2 rounded-2xl bg-rose-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-rose-500/25 transition hover:bg-rose-600">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                Reload Page
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                Return Home
            </a>
        </div>
    </div>
</section>
@endsection
