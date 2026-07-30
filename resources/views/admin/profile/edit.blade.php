@extends('layouts.app')

@section('title', 'Admin Profile & Selfie | MigraVerify')

@section('content')
<section class="min-h-[70vh] bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-3xl px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 border-b border-slate-200 pb-6">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Account Settings</p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-950">Profile & Backend Selfie</h1>
                <p class="mt-1 text-sm text-slate-600">Manage your administrator account details and private backend selfie picture.</p>
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
            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Selfie Avatar Upload & Preview Section --}}
                <div class="rounded-2xl border border-sky-100 bg-sky-50/50 p-5 sm:p-6">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                        <div class="relative shrink-0">
                            @if ($user->selfie_url)
                                <img src="{{ $user->selfie_url }}" alt="{{ $user->name }}" class="h-24 w-24 rounded-2xl object-cover ring-4 ring-white shadow-md">
                            @else
                                <div class="flex h-24 w-24 items-center justify-center rounded-2xl bg-slate-950 text-2xl font-bold text-white ring-4 ring-white shadow-md">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                            @endif
                            <span class="absolute -bottom-1 -right-1 rounded-md bg-sky-600 px-1.5 py-0.5 text-[10px] font-bold text-white shadow-xs">Backend</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-slate-900">Backend Selfie Photo</h3>
                                <span class="rounded-full bg-slate-900 px-2.5 py-0.5 text-[11px] font-bold text-white">Private (Backend Only)</span>
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Upload your selfie image. This picture will only be displayed inside the backend admin panel and navbar.</p>

                            <div class="mt-3.5 flex flex-wrap items-center gap-3">
                                <input type="file" 
                                       id="selfie" 
                                       name="selfie" 
                                       accept="image/jpeg,image/png,image/jpg,image/webp" 
                                       class="block text-xs text-slate-600 file:mr-3 file:rounded-xl file:border-0 file:bg-sky-600 file:px-3.5 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-sky-700 cursor-pointer">
                            </div>
                            @error('selfie')
                                <p class="mt-1.5 text-xs font-semibold text-rose-600">{{ $message }}</p>
                            @enderror

                            @if ($user->selfie_path)
                                <label class="mt-3 flex items-center gap-2 text-xs font-semibold text-rose-600">
                                    <input type="checkbox" name="remove_selfie" value="1" class="h-4 w-4 rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                                    Remove current selfie photo
                                </label>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Name & Email Inputs --}}
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700">Administrator Name</label>
                        <input id="name" 
                               name="name" 
                               type="text" 
                               value="{{ old('name', $user->name) }}" 
                               required 
                               class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        @error('name')
                            <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700">Email Address</label>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               value="{{ old('email', $user->email) }}" 
                               required 
                               class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        @error('email')
                            <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between border-t border-slate-100 pt-6">
                    <a href="{{ route('admin.password.change') }}" class="text-xs font-bold text-sky-700 hover:underline">
                        Need to change password? Click here &rarr;
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-slate-950 px-6 py-3 text-sm font-bold text-white transition hover:bg-sky-700">
                        Save Profile & Selfie
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
