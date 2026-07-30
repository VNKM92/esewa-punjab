@extends('layouts.app')

@section('title', 'Document unavailable | MigraVerify')

@section('content')
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-12 sm:px-6">
    <div class="mx-auto max-w-lg text-center">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-900/5 sm:p-10">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-50 text-amber-700"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 9v4M12 17h.01"/><path d="m10.3 3.8-7 12.1A2 2 0 0 0 5 19h14a2 2 0 0 0 1.7-3.1l-7-12.1a2 2 0 0 0-3.4 0Z"/></svg></div>
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.15em] text-amber-700">Document unavailable</p>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">This link can’t be opened.</h1>
            <p class="mt-4 text-sm leading-6 text-slate-600">The document may have expired, been deactivated by its issuer, or the verification reference may be incorrect.</p>
            <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white transition hover:bg-sky-700">Contact the issuer</a>
        </div>
    </div>
</section>
@endsection
