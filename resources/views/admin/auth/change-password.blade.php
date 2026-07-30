@extends('layouts.app')

@section('title', 'Change Password | MigraVerify')

@section('content')
<section class="min-h-[70vh] bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-2xl px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 border-b border-slate-200 pb-6">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Account Security</p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-950">Change Password</h1>
                <p class="mt-1 text-sm text-slate-600">Update your current admin password to keep your portal secure.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex shrink-0 items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 shadow-xs transition hover:border-sky-200 hover:text-sky-700">
                &larr; Back to Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-8 rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-900/5 sm:p-9">
            <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-sm font-bold text-slate-700">Current Password</label>
                    <input id="current_password" 
                           name="current_password" 
                           type="password" 
                           required 
                           autofocus
                           placeholder="Enter your current password"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('current_password')
                        <p class="mt-1.5 text-sm font-medium text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-slate-100 pt-6">
                    <label for="password" class="block text-sm font-bold text-slate-700">New Password</label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required 
                           placeholder="Minimum 8 characters"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
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
                           placeholder="Re-enter your new password"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                    <a href="{{ route('admin.dashboard') }}" class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-slate-950 px-6 py-3 text-sm font-bold text-white transition hover:bg-sky-700">
                        Update password
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
