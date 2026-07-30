<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur-xl shadow-xs">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        {{-- Brand Logo --}}
        <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="MigraVerify home">
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-950 text-white shadow-lg shadow-slate-950/20 transition-all duration-300 group-hover:scale-105 group-hover:bg-sky-600">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"/>
                    <path d="m8.8 12 2.1 2.1 4.5-4.7"/>
                </svg>
            </span>
            <span>
                <span class="block text-lg font-extrabold tracking-tight text-slate-950">Esewa<span class="text-sky-600">Punjab</span></span>
                <span class="block text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">Document assurance</span>
            </span>
        </a>

        {{-- Desktop Navigation Links --}}
        <div class="hidden items-center gap-1 text-sm font-semibold text-slate-700 lg:flex">
            @foreach ($navigationLinks as $item)
                @php
                    $isCurrent = request()->fullUrlIs(url($item->url)) || request()->is(ltrim($item->url, '/'));
                @endphp
                <a href="{{ $item->url }}" 
                   class="rounded-xl px-4 py-2.5 transition-all duration-200 {{ $isCurrent ? 'bg-sky-50 text-sky-700 font-bold' : 'hover:bg-slate-100 hover:text-slate-950' }}">
                    {{ $item->label }}
                </a>
            @endforeach
        </div>

        {{-- Desktop Right CTA / Account Action --}}
        <div class="hidden items-center gap-3 lg:flex">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-950 px-4 py-2.5 text-sm font-bold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-sky-600">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    Admin Studio
                </a>
            @else
                <a href="{{ route('home') }}#verification-form" class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-sky-600/20 transition hover:-translate-y-0.5 hover:bg-sky-700">
                    Verify Document
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            @endauth
        </div>

        {{-- Mobile & Tablet Menu Toggle Button (lg:hidden) --}}
        <button x-on:click="open = !open" 
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 text-slate-700 transition hover:bg-slate-100 hover:text-slate-950 lg:hidden focus:outline-none"
                aria-label="Toggle navigation menu">
            <svg x-show="!open" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            <svg x-show="open" x-cloak class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Mobile & Tablet Navigation Drawer (lg:hidden) --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak
         class="border-t border-slate-200/80 bg-white/95 px-4 pb-6 pt-3 shadow-xl backdrop-blur-2xl lg:hidden">
        <div class="space-y-1.5">
            @foreach ($navigationLinks as $item)
                @php
                    $isCurrent = request()->fullUrlIs(url($item->url)) || request()->is(ltrim($item->url, '/'));
                @endphp
                <a href="{{ $item->url }}" 
                   x-on:click="open = false"
                   class="flex items-center justify-between rounded-xl px-4 py-3 text-base font-semibold transition {{ $isCurrent ? 'bg-sky-50 text-sky-700 font-bold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950' }}">
                    <span>{{ $item->label }}</span>
                    @if ($isCurrent)
                        <span class="h-2 w-2 rounded-full bg-sky-600"></span>
                    @endif
                </a>
            @endforeach
        </div>
        <div class="mt-4 border-t border-slate-100 pt-4">
            @auth
                <a href="{{ route('admin.dashboard') }}" x-on:click="open = false" class="flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 py-3 text-center text-sm font-bold text-white shadow-md">
                    Admin Studio
                </a>
            @else
                <a href="{{ route('home') }}#verification-form" x-on:click="open = false" class="flex w-full items-center justify-center gap-2 rounded-xl bg-sky-600 py-3 text-center text-sm font-bold text-white shadow-md shadow-sky-600/20">
                    Verify Document
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            @endauth
        </div>
    </div>
</nav>
