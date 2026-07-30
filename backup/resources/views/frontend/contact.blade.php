@extends('layouts.app')

@section('title', 'Verification help | MigraVerify')

@section('content')
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-14 sm:px-6">
    <div class="mx-auto max-w-2xl text-center">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-900/5 sm:p-12">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-sky-700"><svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v8Z"/><path d="M8 10h8M8 14h5"/></svg></div>
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Verification help</p>
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Need help with a document?</h1>
            <p class="mt-4 text-base leading-7 text-slate-600">For a document’s status, content, or expiration, contact the organisation that issued it. They can confirm the appropriate next step or send a new official verification reference.</p>
            <a href="{{ route('home') }}#verify" class="mt-8 inline-flex items-center gap-2 rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-bold text-white transition hover:bg-sky-700">Verify a document<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
    </div>
</section>
@endsection
