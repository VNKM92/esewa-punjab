@extends('layouts.app')

@section('title', 'Contact Us | EsewaPunjab Desk')

@section('content')
{{-- Hero --}}
<section class="hero-grid relative isolate overflow-hidden bg-slate-950 py-20 text-white sm:py-28">
    <div class="pointer-events-none absolute -top-40 left-1/2 -z-10 h-[500px] w-[800px] -translate-x-1/2 blur-3xl opacity-25 bg-gradient-to-tr from-sky-500 to-indigo-600"></div>
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center fade-in-up">
        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-sky-500/30 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-wide text-sky-300 backdrop-blur">
            <span>{{ $page->eyebrow ?? 'Contact Support' }}</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ $page->hero_title }}
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-300">
            {{ $page->hero_description }}
        </p>
    </div>
</section>

{{-- Content & Contact Form --}}
<section class="bg-slate-50 py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12">
            {{-- Left Side Info & Notice --}}
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Get in touch with our desk.</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-600 whitespace-pre-line">{{ $page->body }}</p>
                </div>

                @php
                    $info = $page->sections['info'] ?? [
                        'email' => 'support@EsewaPunjab.in',
                        'phone' => '+91-73408-52926',
                        'hours' => 'Mon - Fri: 8:00 AM - 6:00 PM UTC',
                        'location' => 'Global Verification Center, London / Sydney / New York'
                    ];
                @endphp

                <div class="space-y-4">
                    <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6z"/><path d="m22 6-10 7L2 6"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Email Support</p>
                            <p class="mt-1 text-sm font-bold text-slate-900">{{ $info['email'] ?? 'support@EsewaPunjab.in' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Direct Desk</p>
                            <p class="mt-1 text-sm font-bold text-slate-900">{{ $info['phone'] ?? '+91-73408-52926' }}</p>
                            <p class="text-xs text-slate-500">{{ $info['hours'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Headquarters</p>
                            <p class="mt-1 text-sm font-bold text-slate-900">{{ $info['location'] ?? 'Global Verification Center, 34 Chandigarh' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Form --}}
            <div class="lg:col-span-7">
                <div class="rounded-3xl border border-slate-200/90 bg-white p-8 shadow-xl shadow-slate-900/5 sm:p-10">
                    @if (session('success'))
                        <div class="mb-8 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-800">
                            <svg class="h-5 w-5 shrink-0 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-bold text-slate-800">Full Name</label>
                                <input id="name" name="name" value="{{ old('name') }}" required placeholder="Jane Doe" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">
                                @error('name')<p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-slate-800">Email Address</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="jane@example.com" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">
                                @error('email')<p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-slate-800">Subject</label>
                            <input id="subject" name="subject" value="{{ old('subject') }}" required placeholder="Verification inquiry or technical question" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">
                            @error('subject')<p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-slate-800">Message</label>
                            <textarea id="message" name="message" rows="5" required placeholder="How can our desk assist you today?" class="mt-2 w-full resize-y rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-slate-950 px-6 py-4 text-sm font-bold text-white shadow-lg transition hover:bg-sky-600 focus:outline-none focus:ring-4 focus:ring-sky-200">
                            Send Message
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 14-7-4 14-3-6-7-3Z"/><path d="m12 13 3-3"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
