<footer id="contact" class="border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-5 py-10 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
            <div>
                <div class="flex items-center gap-2.5 text-sm font-bold text-slate-950">
                    @if ($siteSettings->logo_image_url)
                        <img src="{{ $siteSettings->logo_image_url }}" alt="Logo" class="h-7 w-auto max-w-[120px] object-contain rounded-lg">
                    @else
                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-950 text-white">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"/></svg>
                        </span>
                    @endif
                    <span>{{ $siteSettings->logo_text }}<span class="text-sky-600">{{ $siteSettings->logo_text_highlight }}</span></span>
                </div>
                <p class="mt-3 max-w-md text-sm leading-6 text-slate-500">{{ $siteSettings->footer_description ?? 'A clear, secure way to confirm the status of QR-linked immigration documents.' }}</p>
            </div>
            <div class="flex flex-wrap gap-x-5 gap-y-2 text-sm font-semibold text-slate-500">
                <a href="{{ route('home') }}#faq" class="hover:text-sky-700">Support</a>
                <a href="{{ route('posts.index') }}" class="hover:text-sky-700">Migration insights</a>
                <a href="{{ route('terms') }}" class="hover:text-sky-700">Terms</a>
                <a href="{{ route('contact') }}" class="hover:text-sky-700">Contact issuer</a>
            </div>
        </div>
        <div class="mt-8 border-t border-slate-100 pt-5 text-xs text-slate-400">&copy; {{ date('Y') }} {{ $siteSettings->logo_text }}{{ $siteSettings->logo_text_highlight }}. {{ $siteSettings->slogan }}.</div>
    </div>
</footer>
