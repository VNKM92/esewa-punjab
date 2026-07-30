@extends('layouts.app')

@section('title', 'Reset Password | MigraVerify')

@section('content')
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-12 sm:px-6">
    <div class="mx-auto w-full max-w-md">
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-900/5 sm:p-9">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-white">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Security Reset</p>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">Set new password</h1>
            <p class="mt-2 text-sm leading-6 text-slate-600">Please choose a strong new password for your admin account.</p>

            <form method="POST" action="{{ route('password.update') }}" class="mt-7 space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700">Email address</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email', $email) }}" 
                           required 
                           autofocus 
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('email')
                        <p class="mt-1.5 text-sm font-medium text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700">New Password</label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required 
                           placeholder="At least 8 characters"
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('password')
                        <p class="mt-1.5 text-sm font-medium text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-slate-700">Confirm New Password</label>
                    <input id="password_confirmation" 
                           name="password_confirmation" 
                           type="password" 
                           required 
                           placeholder="Re-enter new password"
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-slate-950 px-4 py-3.5 text-sm font-bold text-white transition hover:bg-sky-700">
                    Reset password and sign in
                </button>
            </form>

            <div class="mt-6 border-t border-slate-100 pt-4 text-center">
                <a href="{{ route('admin.login') }}" class="text-xs font-bold text-slate-600 transition hover:text-sky-700">
                    &larr; Return to sign in page
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
