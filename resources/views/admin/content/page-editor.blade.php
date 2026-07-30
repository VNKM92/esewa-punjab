@extends('layouts.app')

@section('title', 'Edit '.$page->name.' | MigraVerify Admin Studio')

@section('content')
<section class="min-h-[70vh] bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-4xl px-4 sm:px-6">
        <a href="{{ route('admin.content.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 transition hover:text-sky-700">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
            Back to Content Studio
        </a>

        <div class="mt-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-10">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start border-b border-slate-100 pb-6">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-wider text-sky-600">Public Page Editor</p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-slate-950">{{ $page->name }}</h1>
                    <p class="mt-1 text-sm text-slate-500">Updates saved here take effect live on the public portal.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="rounded-xl bg-slate-100 px-3 py-1.5 font-mono text-xs font-bold text-slate-600">key: {{ $page->key }}</span>
                </div>
            </div>

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-semibold text-rose-700">
                    Please fix the errors below before saving.
                </div>
            @endif

            <form action="{{ route('admin.content.pages.update', $page) }}" method="POST" class="mt-8 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="meta_title" class="block text-sm font-bold text-slate-800">Browser Page Title</label>
                    <input id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label for="eyebrow" class="block text-sm font-bold text-slate-800">Eyebrow Badge Text</label>
                        <input id="eyebrow" name="eyebrow" value="{{ old('eyebrow', $page->eyebrow) }}" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    </div>

                    <div class="flex items-end">
                        <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-bold text-slate-700 w-full cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $page->is_active)) class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                            <span>Publish page live</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="hero_title" class="block text-sm font-bold text-slate-800">Hero Main Title</label>
                    <input id="hero_title" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('hero_title')<p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="hero_description" class="block text-sm font-bold text-slate-800">Hero Description</label>
                    <textarea id="hero_description" name="hero_description" rows="3" class="mt-2 w-full resize-y rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('hero_description', $page->hero_description) }}</textarea>
                </div>

                <div>
                    <label for="body" class="block text-sm font-bold text-slate-800">Main Page Body Text</label>
                    <textarea id="body" name="body" rows="8" class="mt-2 w-full resize-y rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('body', $page->body) }}</textarea>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label for="cta_label" class="block text-sm font-bold text-slate-800">CTA Button Text <span class="font-normal text-slate-400">(optional)</span></label>
                        <input id="cta_label" name="cta_label" value="{{ old('cta_label', $page->cta_label) }}" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    </div>

                    <div>
                        <label for="cta_url" class="block text-sm font-bold text-slate-800">CTA Button Link <span class="font-normal text-slate-400">(optional)</span></label>
                        <input id="cta_url" name="cta_url" value="{{ old('cta_url', $page->cta_url) }}" placeholder="/#verify" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3.5 text-sm text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    </div>
                </div>

                {{-- JSON Sections Editor --}}
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <label for="sections_json" class="block text-sm font-bold text-slate-900">Dynamic Section Data (JSON)</label>
                    <p class="mt-1 text-xs text-slate-500">Custom section blocks (stats, steps, security pillars, FAQs, info details) stored in JSON format.</p>
                    
                    <textarea id="sections_json" 
                              name="sections_json" 
                              rows="10" 
                              class="mt-3 w-full resize-y rounded-xl border border-slate-200 bg-white p-4 font-mono text-xs text-slate-900 outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('sections_json', $page->sections ? json_encode($page->sections, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : '') }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                    <a href="{{ route('admin.content.index') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50">Cancel</a>
                    <button type="submit" class="rounded-2xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-md transition hover:bg-sky-600">Save Page Changes</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
