@extends('layouts.app')

@section('title', 'Admin login | MigraVerify')

@section('content')
<section class="flex min-h-[70vh] items-center bg-slate-50 px-5 py-12 sm:px-6">
    <div class="mx-auto w-full max-w-md">
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-900/5 sm:p-9">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-white">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="5" y="11" width="14" height="10" rx="2"/>
                    <path d="M8 11V8a4 4 0 1 1 8 0v3"/>
                </svg>
            </div>
            
            <p class="mt-6 text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Protected area</p>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-950">Admin sign in</h1>
            <p class="mt-2 text-sm leading-6 text-slate-600">Manage documents, QR access, and portal traffic.</p>

            @if (session('success'))
                <p class="mt-5 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('admin.login.store') }}" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700">Email</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('email')
                        <p class="mt-1.5 text-sm font-medium text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                        <a href="{{ route('password.request') }}" class="text-xs font-bold text-sky-700 hover:underline">Forgot password?</a>
                    </div>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required 
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <label class="flex items-center gap-2 text-sm font-semibold text-slate-600">
                    <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                    Remember this browser
                </label>

                <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-slate-950 px-4 py-3.5 text-sm font-bold text-white transition hover:bg-sky-700">
                    Sign in to dashboard
                </button>
            </form>

            <p class="mt-6 text-xs leading-5 text-slate-500">
                Demo access after seeding: <span class="font-semibold">admin@migraverify.test</span> / <span class="font-semibold">password</span>
            </p>
        </div>
    </div>
</section>
@endsection
