@extends('layouts.app')

@section('title', 'Forgot Password | MigraVerify')

@section('content')
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-12 sm:px-6">
    <div class="mx-auto w-full max-w-md">
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-900/5 sm:p-9">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-white">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 2l-2 2m-2-2l2 2m2 4l-4 4M9 11a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                    <path d="M15 7h.01" />
                </svg>
            </div>
            
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Account Recovery</p>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">Forgot password?</h1>
            <p class="mt-2 text-sm leading-6 text-slate-600">Enter your registered email address and we'll send you a password reset link.</p>

            @if (session('status'))
                <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                    <p class="text-sm font-semibold text-emerald-800">{{ session('status') }}</p>
                    @if (session('demo_reset_url'))
                        <div class="mt-3 border-t border-emerald-200 pt-3">
                            <p class="text-xs text-emerald-700">Quick Test Link (Local environment):</p>
                            <a href="{{ session('demo_reset_url') }}" class="mt-1 inline-block text-xs font-bold text-sky-700 hover:underline">
                                Click here to open password reset form &rarr;
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700">Registered Email Address</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="admin@migraverify.test"
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('email')
                        <p class="mt-1.5 text-sm font-medium text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-slate-950 px-4 py-3.5 text-sm font-bold text-white transition hover:bg-sky-700">
                    Send password reset link
                </button>
            </form>

            <div class="mt-6 border-t border-slate-100 pt-4 text-center">
                <a href="{{ route('admin.login') }}" class="text-xs font-bold text-slate-600 transition hover:text-sky-700">
                    &larr; Back to sign in
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
