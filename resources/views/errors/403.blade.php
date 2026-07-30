@extends('layouts.app')

@section('title', '403 Access Forbidden | MigraVerify')

@section('content')
<section class="hero-grid relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-slate-950 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-amber-500 to-rose-600"></div>

    <div class="mx-auto max-w-xl text-center fade-in-up">
        {{-- Large Floating Error Code --}}
        <div class="relative mx-auto flex items-center justify-center">
            <span class="select-none text-8xl font-black tracking-widest text-white/10 sm:text-9xl">403</span>
            <div class="absolute flex h-20 w-20 items-center justify-center rounded-3xl bg-amber-500/20 text-amber-400 ring-1 ring-amber-500/30 backdrop-blur-xl shadow-2xl shadow-amber-500/20">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </div>
        </div>

        <div class="mt-8">
            <div class="inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-amber-300 backdrop-blur">
                Access Restricted
            </div>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Protected Section</h1>
            <p class="mt-3 text-base leading-7 text-slate-300">
                You do not have administrative permission or authorization to access this area of the MigraVerify portal.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-2xl bg-amber-500 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-amber-500/25 transition hover:bg-amber-400">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Return Home
            </a>
            @guest
                <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 backdrop-blur transition hover:border-white/30 hover:bg-white/10 hover:text-white">
                    Admin Sign In
                </a>
            @endguest
        </div>
    </div>
</section>
@endsection
