@extends('layouts.app')

@section('title', 'Terms of use | MigraVerify')

@section('content')
<section class="bg-slate-50 py-14 sm:py-20">
    <article class="mx-auto max-w-3xl rounded-3xl border border-slate-200 bg-white p-7 shadow-sm sm:p-10">
        <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Terms of use</p>
        <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Using this verification portal</h1>
        <div class="mt-8 space-y-7 text-sm leading-7 text-slate-600">
            <section><h2 class="text-base font-bold text-slate-900">Use official references only</h2><p class="mt-2">Use a QR code or reference supplied by the document issuer. Do not attempt to access records you are not authorised to view.</p></section>
            <section><h2 class="text-base font-bold text-slate-900">Verification status</h2><p class="mt-2">A result reflects the availability of the document reference at the time of the check. The document issuer remains responsible for the underlying record and any decisions based on it.</p></section>
            <section><h2 class="text-base font-bold text-slate-900">Privacy and security</h2><p class="mt-2">Keep document references private. If you believe a link has been shared or used in error, contact the organisation that issued the document.</p></section>
        </div>
    </article>
</section>
@endsection
