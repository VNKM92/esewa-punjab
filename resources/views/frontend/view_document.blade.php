@extends('layouts.app')

@section('title', 'Verified document | EsewaPunjab')

@section('content')
@php
    $isPdf = \Illuminate\Support\Str::endsWith(strtolower($doc->file_path), '.pdf');
    $fileUrl = asset('storage/' . $doc->file_path);
@endphp
<section class="min-h-[70vh] bg-slate-50 py-12 sm:py-16">
    <div class="mx-auto max-w-5xl px-5 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 transition hover:text-sky-700"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>Back to EsewaPunjab</a>
        <div class="mt-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-900/5">
            <div class="flex flex-col gap-5 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-8">
                <div><span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-700"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Verified access</span><h1 class="mt-3 text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">{{ $doc->title }}</h1><p class="mt-1 text-sm text-slate-500">Issued for {{ $doc->applicant_name }}</p></div>
                <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-950 px-4 py-3 text-sm font-bold text-white transition hover:bg-sky-700">Open in new tab<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 4h6v6M20 4l-9 9"/><path d="M19 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5"/></svg></a>
            </div>
            <div class="bg-slate-100 p-3 sm:p-6">
                @if ($isPdf)
                    <iframe src="{{ $fileUrl }}" title="{{ $doc->title }}" class="h-[65vh] w-full rounded-xl border border-slate-200 bg-white"></iframe>
                @else
                    <img src="{{ $fileUrl }}" alt="{{ $doc->title }}" class="mx-auto max-h-[65vh] rounded-xl border border-slate-200 bg-white object-contain">
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
