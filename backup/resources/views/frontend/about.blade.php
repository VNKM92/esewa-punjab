@extends('layouts.app')

@section('title', 'About MigraVerify')

@section('content')
<section class="bg-slate-950 py-20 text-white sm:py-24">
    <div class="mx-auto max-w-4xl px-5 sm:px-6 lg:px-8">
        <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-300">About MigraVerify</p>
        <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-5xl">Making document checks clearer for everyone involved.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">MigraVerify provides a simple verification layer for QR-linked migration and immigration documents. It helps a verifier confirm a record while keeping control with the organisation that issued it.</p>
    </div>
</section>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-4xl gap-8 px-5 sm:px-6 md:grid-cols-2 lg:px-8">
        <div class="rounded-2xl border border-slate-200 p-7"><h2 class="text-xl font-bold text-slate-950">For document issuers</h2><p class="mt-3 text-sm leading-6 text-slate-600">Issue a QR-linked reference, monitor access, and disable a document link whenever its status changes.</p></div>
        <div class="rounded-2xl border border-slate-200 p-7"><h2 class="text-xl font-bold text-slate-950">For verifiers</h2><p class="mt-3 text-sm leading-6 text-slate-600">Use the official reference to reach a live, controlled status check without relying on forwarded files alone.</p></div>
    </div>
</section>
@endsection
