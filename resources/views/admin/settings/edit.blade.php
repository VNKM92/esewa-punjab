@extends('layouts.app')

@section('title', 'Dynamic Branding & Logo Settings | MigraVerify')

@section('content')
<section class="min-h-[70vh] bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-4xl px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 border-b border-slate-200 pb-6">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Site Management</p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-950">Dynamic Logo & Slogan Settings</h1>
                <p class="mt-1 text-sm text-slate-600">Customize the site logo image, brand text, slogan, and portal identity across all pages.</p>
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
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Live Brand Logo & Slogan Preview Box --}}
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Live Header Preview</p>
                    <div class="mt-4 flex items-center gap-3">
                        @if ($settings->logo_image_url)
                            <img src="{{ $settings->logo_image_url }}" alt="Logo preview" class="h-11 w-auto max-w-[160px] object-contain rounded-xl">
                        @else
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-950 text-white shadow-md">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"/>
                                    <path d="m8.8 12 2.1 2.1 4.5-4.7"/>
                                </svg>
                            </span>
                        @endif
                        <div>
                            <p class="text-lg font-extrabold tracking-tight text-slate-950">
                                {{ $settings->logo_text }}<span class="text-sky-600">{{ $settings->logo_text_highlight }}</span>
                            </p>
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                                {{ $settings->slogan }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Logo Image Upload Section --}}
                <div class="rounded-2xl border border-slate-200 p-5 sm:p-6 space-y-4">
                    <h3 class="font-bold text-slate-950">Custom Logo Image</h3>
                    <p class="text-xs text-slate-500">Upload a custom logo image file (PNG, JPG, SVG, WEBP). If omitted or removed, the system icon with custom logo text will be displayed.</p>

                    <div>
                        <input type="file" 
                               id="logo_image" 
                               name="logo_image" 
                               accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml" 
                               class="block text-xs text-slate-600 file:mr-3 file:rounded-xl file:border-0 file:bg-slate-950 file:px-4 file:py-2.5 file:text-xs file:font-bold file:text-white hover:file:bg-sky-700 cursor-pointer">
                        @error('logo_image')
                            <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($settings->logo_image_path)
                        <label class="flex items-center gap-2 text-xs font-semibold text-rose-600">
                            <input type="checkbox" name="remove_logo" value="1" class="h-4 w-4 rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                            Remove custom logo image (revert to default icon logo)
                        </label>
                    @endif
                </div>

                {{-- Brand Text & Highlight Section --}}
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="logo_text" class="block text-sm font-bold text-slate-700">Logo Primary Text</label>
                        <input id="logo_text" 
                               name="logo_text" 
                               type="text" 
                               value="{{ old('logo_text', $settings->logo_text) }}" 
                               required 
                               class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        @error('logo_text')
                            <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="logo_text_highlight" class="block text-sm font-bold text-slate-700">Logo Highlight Text <span class="font-normal text-slate-400">(Colored)</span></label>
                        <input id="logo_text_highlight" 
                               name="logo_text_highlight" 
                               type="text" 
                               value="{{ old('logo_text_highlight', $settings->logo_text_highlight) }}" 
                               class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                        @error('logo_text_highlight')
                            <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Dynamic Slogan Input --}}
                <div>
                    <label for="slogan" class="block text-sm font-bold text-slate-700">Dynamic Slogan / Tagline</label>
                    <input id="slogan" 
                           name="slogan" 
                           type="text" 
                           value="{{ old('slogan', $settings->slogan) }}" 
                           required 
                           placeholder="e.g. Document assurance"
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    <p class="mt-1 text-xs text-slate-500">This slogan appears dynamically beneath the logo in the site header and footer.</p>
                    @error('slogan')
                        <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Global Site Title Input --}}
                <div>
                    <label for="site_title" class="block text-sm font-bold text-slate-700">Global Website Title</label>
                    <input id="site_title" 
                           name="site_title" 
                           type="text" 
                           value="{{ old('site_title', $settings->site_title) }}" 
                           required 
                           class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                    @error('site_title')
                        <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Footer Description Input --}}
                <div>
                    <label for="footer_description" class="block text-sm font-bold text-slate-700">Footer Short Description</label>
                    <textarea id="footer_description" 
                              name="footer_description" 
                              rows="3" 
                              class="mt-1.5 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('footer_description', $settings->footer_description) }}</textarea>
                    @error('footer_description')
                        <p class="mt-1 text-xs font-semibold text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end border-t border-slate-100 pt-6">
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-sky-700">
                        Save Dynamic Logo & Slogan Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
