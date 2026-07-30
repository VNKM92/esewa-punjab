@extends('layouts.app')

@section('title', 'MigraVerify | Secure visa document verification')

@section('content')
<section id="verify" class="hero-grid relative isolate overflow-hidden bg-slate-950 text-white">
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_72%_30%,rgba(14,165,233,0.25),transparent_25rem),radial-gradient(circle_at_25%_100%,rgba(99,102,241,0.20),transparent_28rem)]"></div>
    <div class="relative mx-auto grid max-w-7xl gap-14 px-5 pb-20 pt-16 sm:px-6 sm:pb-24 sm:pt-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:gap-20 lg:px-8 lg:py-28">
        <div>
            <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-2 text-xs font-bold tracking-wide text-sky-100 shadow-sm backdrop-blur">
                <span class="h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_0_4px_rgba(74,222,128,0.13)]"></span>
                QR-BASED DOCUMENT ASSURANCE
            </div>
            <h1 class="max-w-3xl text-4xl font-bold tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl lg:leading-[1.05]">
                Verify migration documents with <span class="text-sky-300">clarity and confidence.</span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                MigraVerify gives institutions, employers, and applicants a secure way to confirm QR-linked documents in seconds.
            </p>
            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="#verification-form" class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3.5 text-sm font-bold text-slate-950 shadow-xl shadow-black/15 transition hover:-translate-y-0.5 hover:bg-sky-50">
                    Start verification
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
                <a href="#how-it-works" class="inline-flex items-center gap-2 px-2 py-3 text-sm font-bold text-slate-200 transition hover:text-white">
                    See how it works
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>
            <div class="mt-12 flex flex-wrap gap-x-7 gap-y-4 text-sm text-slate-300">
                <span class="inline-flex items-center gap-2"><svg class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg>Encrypted document access</span>
                <span class="inline-flex items-center gap-2"><svg class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg>Instant status check</span>
            </div>
        </div>

        <div class="hero-orbit relative mx-auto w-full max-w-lg">
            <div class="absolute -right-8 -top-8 h-40 w-40 rounded-full border border-sky-300/20"></div>
            <div class="absolute -bottom-10 -left-10 h-52 w-52 rounded-full border border-indigo-300/15"></div>
            <div class="relative rounded-3xl border border-white/15 bg-white/[0.09] p-3 shadow-2xl shadow-black/30 backdrop-blur-xl sm:p-5">
                <div class="rounded-2xl bg-white p-5 text-slate-900 sm:p-7">
                    <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-50 text-sky-700">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">Document check</p>
                                <p class="mt-0.5 text-sm font-bold text-slate-900">Secure verification portal</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-700"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Protected</span>
                    </div>

                    <form id="verification-form" method="GET" action="{{ route('verify.lookup') }}" class="mt-6">
                        <label for="uuid" class="block text-sm font-bold text-slate-800">Enter document reference</label>
                        <p class="mt-1 text-xs leading-5 text-slate-500">Use the reference from an official MigraVerify QR code or document notice.</p>
                        <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                            <input id="uuid" name="uuid" value="{{ old('uuid') }}" placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" autocomplete="off" required class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100">
                            <button type="submit" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-sky-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-sky-600/20 transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200">
                                Check status
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                        @error('uuid')
                            <p class="mt-3 text-sm font-medium text-rose-600">{{ $message }}</p>
                        @enderror
                    </form>

                    <div class="mt-6 grid grid-cols-3 border-t border-slate-100 pt-5 text-center">
                        <div class="border-r border-slate-100 px-2"><svg class="mx-auto h-5 w-5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20M4.9 4.9l14.2 14.2M19.1 4.9 4.9 19.1"/></svg><p class="mt-2 text-[11px] font-bold text-slate-600">QR linked</p></div>
                        <div class="border-r border-slate-100 px-2"><svg class="mx-auto h-5 w-5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg><p class="mt-2 text-[11px] font-bold text-slate-600">Access controlled</p></div>
                        <div class="px-2"><svg class="mx-auto h-5 w-5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg><p class="mt-2 text-[11px] font-bold text-slate-600">Live status</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-slate-200 bg-white">
    <div class="mx-auto grid max-w-7xl divide-y divide-slate-200 px-5 sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:px-6 lg:px-8">
        <div class="py-6 sm:py-7"><p class="text-sm font-bold text-slate-950">Simple to check</p><p class="mt-1 text-sm text-slate-500">A clear result, without account creation.</p></div>
        <div class="py-6 sm:px-7 sm:py-7"><p class="text-sm font-bold text-slate-950">Built for real handoffs</p><p class="mt-1 text-sm text-slate-500">For institutions, employers, and applicants.</p></div>
        <div class="py-6 sm:pl-7 sm:py-7"><p class="text-sm font-bold text-slate-950">Controlled by the issuer</p><p class="mt-1 text-sm text-slate-500">Document access can be updated or revoked.</p></div>
    </div>
</section>

<section id="how-it-works" class="scroll-mt-24 bg-slate-50 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">How it works</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">A straightforward route to document confidence.</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">Every check follows a short, clear path designed to give the verifier an up-to-date answer.</p>
        </div>
        <div class="mt-12 grid gap-5 md:grid-cols-3">
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sm font-extrabold text-sky-700">01</span><h3 class="mt-6 text-lg font-bold text-slate-950">Scan or enter the reference</h3><p class="mt-3 text-sm leading-6 text-slate-600">Open the official QR link, or enter the reference printed on the document notice.</p></article>
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-sm font-extrabold text-indigo-700">02</span><h3 class="mt-6 text-lg font-bold text-slate-950">Complete the security check</h3><p class="mt-3 text-sm leading-6 text-slate-600">A small verification step helps keep personal records from being exposed unnecessarily.</p></article>
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-sm font-extrabold text-emerald-700">03</span><h3 class="mt-6 text-lg font-bold text-slate-950">Confirm the live status</h3><p class="mt-3 text-sm leading-6 text-slate-600">See whether the document is active, controlled by its issuer, and available to view.</p></article>
        </div>
    </div>
</section>

<section id="documents" class="scroll-mt-24 bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end"><div class="max-w-2xl"><p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Designed for mobility workflows</p><h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Documents that need a dependable trail.</h2></div><p class="max-w-md text-base leading-7 text-slate-600">Use QR-linked verification to make the handoff between people, organisations, and borders more reliable.</p></div>
        <div class="mt-12 grid gap-5 md:grid-cols-3">
            <article class="group rounded-2xl border border-slate-200 p-7 transition duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl hover:shadow-sky-900/5"><div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-50 text-sky-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M8 3v4M16 3v4M4 9h16M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="M8 13h3M8 17h7"/></svg></div><h3 class="mt-6 text-lg font-bold text-slate-950">Civil records</h3><p class="mt-3 text-sm leading-6 text-slate-600">Marriage certificates and other relationship records used during an application process.</p></article>
            <article class="group rounded-2xl border border-slate-200 p-7 transition duration-300 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-900/5"><div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 3h10l3 4v14H4V7l3-4Z"/><path d="M8 12h8M8 16h5"/></svg></div><h3 class="mt-6 text-lg font-bold text-slate-950">Work and residency files</h3><p class="mt-3 text-sm leading-6 text-slate-600">Permission documents that need to be checked by an employer, school, or government office.</p></article>
            <article class="group rounded-2xl border border-slate-200 p-7 transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-900/5"><div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 9h5M7 13h9M16 9h1"/></svg></div><h3 class="mt-6 text-lg font-bold text-slate-950">Identity evidence</h3><p class="mt-3 text-sm leading-6 text-slate-600">Supporting identity records that must stay protected while their validity can still be confirmed.</p></article>
        </div>
    </div>
</section>

<section id="security" class="scroll-mt-24 bg-slate-950 py-20 text-white sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:items-center lg:gap-20 lg:px-8">
        <div><p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-300">Security by design</p><h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Verification should not compromise privacy.</h2><p class="mt-5 max-w-xl text-lg leading-8 text-slate-300">MigraVerify separates a quick status check from the sensitive records behind it, with issuer control throughout the document lifecycle.</p></div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6"><svg class="h-6 w-6 text-sky-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"/><path d="m8.8 12 2.1 2.1 4.5-4.7"/></svg><h3 class="mt-5 font-bold">Controlled access</h3><p class="mt-2 text-sm leading-6 text-slate-300">Only active, authorised links make a document available.</p></div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6"><svg class="h-6 w-6 text-sky-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 17.5V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10.5M8 17h8M12 13v4"/><path d="M8 9h8"/></svg><h3 class="mt-5 font-bold">Live validation</h3><p class="mt-2 text-sm leading-6 text-slate-300">The result reflects the current status maintained by the issuer.</p></div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6 sm:col-span-2"><div class="flex gap-4"><svg class="mt-0.5 h-6 w-6 shrink-0 text-sky-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg><div><h3 class="font-bold">A verification gate before view</h3><p class="mt-2 text-sm leading-6 text-slate-300">A brief challenge adds protection before sensitive document files are opened.</p></div></div></div>
        </div>
    </div>
</section>

<section id="faq" class="scroll-mt-24 bg-slate-50 py-20 sm:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-6 lg:grid-cols-[.75fr_1.25fr] lg:gap-20 lg:px-8"><div><p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Help centre</p><h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Questions, answered clearly.</h2><p class="mt-4 text-base leading-7 text-slate-600">If you are checking a document on behalf of an organisation, keep the reference private and use the QR link supplied by the issuer.</p></div><div class="divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white px-6"><details class="group py-5" open><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-bold text-slate-950 [&::-webkit-details-marker]:hidden">Where do I find the document reference?<svg class="h-4 w-4 shrink-0 transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></summary><p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">The reference is encoded in the official MigraVerify QR code and may also be printed on the document notice provided by the issuer.</p></details><details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-bold text-slate-950 [&::-webkit-details-marker]:hidden">Why is a security question required?<svg class="h-4 w-4 shrink-0 transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></summary><p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">It helps prevent automated or unintended access before a sensitive document is displayed.</p></details><details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-bold text-slate-950 [&::-webkit-details-marker]:hidden">What does an unavailable document mean?<svg class="h-4 w-4 shrink-0 transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></summary><p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">The issuer may have deactivated the link, its access period may have ended, or the reference may be incorrect. Contact the document issuer for next steps.</p></details></div></div>
</section>
@endsection
