<nav class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">
    <div class="mx-auto flex h-[76px] max-w-7xl items-center justify-between px-5 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="MigraVerify home">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-950 text-white shadow-lg shadow-slate-900/15 transition-transform duration-300 group-hover:-rotate-6">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"/><path d="m8.8 12 2.1 2.1 4.5-4.7"/></svg>
            </span>
            <span>
                <span class="block text-base font-bold tracking-tight text-slate-950">MigraVerify</span>
                <span class="block text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">Document assurance</span>
            </span>
        </a>

        <div class="hidden items-center gap-7 text-sm font-semibold text-slate-600 md:flex">
            <a href="{{ route('home') }}#how-it-works" class="transition hover:text-sky-700">How it works</a>
            <a href="{{ route('home') }}#documents" class="transition hover:text-sky-700">Documents</a>
            <a href="{{ route('home') }}#security" class="transition hover:text-sky-700">Security</a>
            <a href="{{ route('home') }}#faq" class="transition hover:text-sky-700">Help centre</a>
        </div>

        <a href="{{ route('home') }}#verify" class="hidden rounded-xl bg-slate-950 px-4 py-2.5 text-sm font-bold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-sky-700 sm:inline-flex">
            Verify document
        </a>

        <details class="relative md:hidden">
            <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-xl border border-slate-200 text-slate-700 [&::-webkit-details-marker]:hidden" aria-label="Open navigation">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </summary>
            <div class="absolute right-0 top-12 w-56 rounded-2xl border border-slate-200 bg-white p-2 shadow-xl shadow-slate-900/10">
                <a href="{{ route('home') }}#how-it-works" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">How it works</a>
                <a href="{{ route('home') }}#documents" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Documents</a>
                <a href="{{ route('home') }}#security" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Security</a>
                <a href="{{ route('home') }}#verify" class="mt-1 block rounded-xl bg-slate-950 px-4 py-3 text-sm font-bold text-white">Verify document</a>
            </div>
        </details>
    </div>
</nav>
