@extends('layouts.app')

@section('title', 'Secure verification | MigraVerify')

@section('content')
@php
    $num1 = random_int(1, 9);
    $num2 = random_int(1, 9);
    session(['captcha_result' => $num1 + $num2]);
@endphp
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-12 sm:px-6">
    <div class="mx-auto w-full max-w-md">
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-900/5 sm:p-9">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-50 text-sky-700">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg>
            </div>
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.15em] text-sky-700">Secure document access</p>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">One quick security check</h1>
            <p class="mt-3 text-sm leading-6 text-slate-600">Confirm you are a person before opening <span class="font-semibold text-slate-800">{{ $doc->title }}</span>.</p>

            <form method="POST" action="{{ route('verify.submit', $doc->uuid) }}" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label for="captcha_input" class="block text-sm font-bold text-slate-800">What is <span class="text-sky-700">{{ $num1 }} + {{ $num2 }}</span>?</label>
                    <input id="captcha_input" type="number" name="captcha_input" required autofocus inputmode="numeric" class="mt-3 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">
                    @error('captcha')<p class="mt-2 text-sm font-medium text-rose-600">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-slate-900/10 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200">Verify and open document<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
            </form>
        </div>
        <p class="mt-5 text-center text-xs leading-5 text-slate-500">Only proceed if this verification link was provided by the document issuer.</p>
    </div>
</section>
@endsection
