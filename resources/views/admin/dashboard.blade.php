@extends('layouts.app')

@section('title', 'Verification management | MigraVerify')

@section('content')
<section class="min-h-[70vh] bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div><p class="text-sm font-bold uppercase tracking-[0.16em] text-sky-700">Admin console</p><h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Verification management</h1><p class="mt-2 text-sm text-slate-600">Manage document access and see how visitors use the portal.</p></div>
            <div class="flex flex-wrap items-center gap-3"><a href="{{ route('admin.profile.edit') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-3.5 py-2.5 text-sm font-bold text-slate-700 transition hover:bg-slate-200">@if (auth()->user()->selfie_url)<img src="{{ auth()->user()->selfie_url }}" alt="Profile" class="h-6 w-6 rounded-full object-cover ring-2 ring-sky-500">@else<svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>@endif Profile & Selfie</a><a href="{{ route('admin.settings.edit') }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 transition hover:border-sky-200 hover:text-sky-700">Logo & Slogan</a><a href="{{ route('admin.content.index') }}" class="rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-700">Manage content</a><a href="{{ route('admin.password.change') }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 transition hover:border-sky-200 hover:text-sky-700">Change password</a><form action="{{ route('admin.logout') }}" method="POST">@csrf<button class="rounded-xl bg-slate-950 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-sky-700">Sign out</button></form></div>
        </div>

        @if (session('success'))<div class="mt-7 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">{{ session('success') }}</div>@endif

        <div class="mt-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Issued documents</p><span class="rounded-lg bg-slate-100 p-2 text-slate-600"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg></span></div><p class="mt-4 text-3xl font-bold tracking-tight text-slate-950">{{ $totalDocuments }}</p><p class="mt-2 text-xs font-semibold text-emerald-700">{{ $activeDocuments }} currently active</p></div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">QR scans</p><span class="rounded-lg bg-sky-50 p-2 text-sky-700"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M12 3v18"/></svg></span></div><p class="mt-4 text-3xl font-bold tracking-tight text-sky-700">{{ number_format($totalScans) }}</p><p class="mt-2 text-xs font-semibold text-slate-500">Across all issued links</p></div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Page visits</p><span class="rounded-lg bg-indigo-50 p-2 text-indigo-700"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/><path d="M3.6 9h16.8M3.6 15h16.8M12 3c2 2.4 3 5.4 3 9s-1 6.6-3 9c-2-2.4-3-5.4-3-9s1-6.6 3-9Z"/></svg></span></div><p class="mt-4 text-3xl font-bold tracking-tight text-indigo-700">{{ number_format($totalVisits) }}</p><p class="mt-2 text-xs font-semibold text-slate-500">Tracked public page loads</p></div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Unique visitors</p><span class="rounded-lg bg-emerald-50 p-2 text-emerald-700"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/></svg></span></div><p class="mt-4 text-3xl font-bold tracking-tight text-emerald-700">{{ number_format($uniqueVisitors) }}</p><p class="mt-2 text-xs font-semibold text-slate-500">Based on visitor addresses</p></div>
        </div>

        <div class="mt-8 grid gap-8 xl:grid-cols-[1.45fr_.55fr]">
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7"><div class="flex items-start justify-between gap-4"><div><h2 class="text-lg font-bold text-slate-950">Traffic over the last 7 days</h2><p class="mt-1 text-sm text-slate-500">Unique page loads are tracked once per visitor and page each hour.</p></div><span class="rounded-xl bg-sky-50 px-3 py-2 text-xs font-bold text-sky-700">Live activity</span></div><div class="mt-8 flex h-44 items-end gap-3 border-b border-slate-100 pb-7 sm:gap-5">@foreach ($dailyTraffic as $point)<div class="flex h-full flex-1 flex-col justify-end"><div class="group relative flex w-full flex-1 items-end"><div class="w-full rounded-t-lg bg-gradient-to-t from-sky-600 to-cyan-400 transition duration-300 hover:from-indigo-600 hover:to-sky-400" style="height: {{ max(8, round(($point['visits'] / $trafficPeak) * 100)) }}%" title="{{ $point['visits'] }} visits"></div><span class="pointer-events-none absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-950 px-2 py-1 text-[10px] font-bold text-white group-hover:block">{{ $point['visits'] }}</span></div><p class="mt-3 text-center text-xs font-bold text-slate-500">{{ $point['label'] }}</p></div>@endforeach</div><div class="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-xs font-semibold text-slate-500"><span class="inline-flex items-center gap-2"><i class="h-2.5 w-2.5 rounded-full bg-sky-500"></i>Page visits</span><span>{{ $dailyTraffic->sum('visits') }} visits in the last seven days</span><span>{{ $dailyTraffic->sum('unique') }} unique visitor records</span></div></section>
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"><div class="border-b border-slate-100 p-6"><h2 class="text-lg font-bold text-slate-950">Recent traffic</h2><p class="mt-1 text-sm text-slate-500">Latest public portal activity.</p></div><div class="divide-y divide-slate-100">@forelse ($recentViews as $view)<div class="flex items-center justify-between gap-4 px-6 py-4"><div class="min-w-0"><p class="truncate text-sm font-bold text-slate-800">{{ $view->page_url }}</p><p class="mt-1 text-xs text-slate-500">{{ $view->ip_address ?? 'Unknown visitor' }}</p></div><time class="shrink-0 text-xs font-semibold text-slate-400">{{ $view->created_at->diffForHumans() }}</time></div>@empty<div class="px-6 py-10 text-center text-sm text-slate-500">Visits will appear after visitors use the public portal.</div>@endforelse</div></section>
        </div>

        <section class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-950">Recent enquiries</h2>
                    <p class="mt-1 text-sm text-slate-500">Messages submitted through the public contact page.</p>
                </div>
                <span class="rounded-xl bg-violet-50 px-3 py-2 text-sm font-bold text-violet-700">{{ $totalInquiries }} total</span>
            </div>
            <div class="grid divide-y divide-slate-100 md:grid-cols-2 md:divide-x md:divide-y-0">
                @forelse ($recentMessages as $message)
                    <article class="p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="font-bold text-slate-900">{{ $message->subject }}</p>
                                    <p class="mt-1 text-sm text-slate-500">{{ $message->name }} &middot; {{ $message->email }}</p>
                                </div>
                                <time class="shrink-0 text-xs font-semibold text-slate-400">{{ $message->created_at->diffForHumans() }}</time>
                            </div>
                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">{{ $message->message }}</p>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-bold text-rose-600 hover:bg-rose-50 transition">
                                    Delete message
                                </button>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="p-8 text-center text-sm text-slate-500 md:col-span-2">Contact enquiries will appear here when visitors submit the form.</div>
                @endforelse
            </div>
        </section>

        <div class="mt-8 grid gap-8 xl:grid-cols-[.8fr_1.2fr]">
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7"><h2 class="text-lg font-bold text-slate-950">Issue a verification link</h2><p class="mt-1 text-sm leading-6 text-slate-500">Upload an image or PDF. A unique QR verification link is created automatically.</p>
                <form method="POST" action="{{ route('admin.doc.store') }}" enctype="multipart/form-data" class="mt-6 space-y-4">@csrf
                    <div><label for="title" class="block text-sm font-bold text-slate-700">Document title</label><input id="title" name="title" value="{{ old('title') }}" required class="mt-1.5 w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">@error('title')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror</div>
                    <div><label for="applicant_name" class="block text-sm font-bold text-slate-700">Applicant name</label><input id="applicant_name" name="applicant_name" value="{{ old('applicant_name') }}" required class="mt-1.5 w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100">@error('applicant_name')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror</div>
                    <div class="grid gap-4 sm:grid-cols-2"><div><label for="document_type" class="block text-sm font-bold text-slate-700">Document type</label><select id="document_type" name="document_type" required class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100"><option value="">Choose type</option><option value="Marriage certificate">Marriage certificate</option><option value="Work permit">Work permit</option><option value="Residency permit">Residency permit</option><option value="Identity evidence">Identity evidence</option></select>@error('document_type')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror</div><div><label for="expires_at" class="block text-sm font-bold text-slate-700">Expiry date <span class="font-normal text-slate-400">(optional)</span></label><input id="expires_at" type="datetime-local" name="expires_at" value="{{ old('expires_at') }}" class="mt-1.5 w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100"></div></div>
                    <div><label for="document" class="block text-sm font-bold text-slate-700">Document file</label><input id="document" type="file" name="document" accept="application/pdf,image/jpeg,image/png" required class="mt-1.5 block w-full rounded-xl border border-slate-200 p-2 text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-sky-50 file:px-3 file:py-1.5 file:text-sm file:font-bold file:text-sky-700">@error('document')<p class="mt-1 text-xs text-rose-600">{{ $message }}</p>@enderror</div>
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-700"><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" checked class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">Activate verification link now</label>
                    <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-slate-950 px-4 py-3 text-sm font-bold text-white transition hover:bg-sky-700">Upload and issue QR link</button>
                </form>
            </section>

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex flex-col gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-950">Issued documents & QR links</h2>
                        <p class="mt-1 text-sm text-slate-500">Manage live access permissions, retrieve QR codes, and copy verification references.</p>
                    </div>
                    <span class="text-sm font-bold text-slate-500">{{ $totalDocuments }} total</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-[760px] w-full text-left text-sm">
                        <thead class="bg-slate-50 text-xs font-bold uppercase tracking-[0.08em] text-slate-500">
                            <tr>
                                <th class="px-5 py-4">Document Details</th>
                                <th class="px-5 py-4">Access Permission</th>
                                <th class="px-5 py-4">Scans</th>
                                <th class="px-5 py-4">QR Code & Link</th>
                                <th class="px-5 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($documents as $doc)
                                @php
                                    $verifyUrl = route('verify.captcha', $doc->uuid);
                                @endphp
                                <tr x-data="{ showQr: false, copied: false }">
                                    <td class="px-5 py-4">
                                        <p class="font-bold text-slate-900">{{ $doc->title }}</p>
                                        <p class="mt-0.5 text-xs text-slate-500">{{ $doc->applicant_name }} &middot; {{ $doc->document_type }}</p>
                                        <p class="mt-1 font-mono text-[11px] text-slate-400">UUID: {{ $doc->uuid }}</p>
                                    </td>
                                    <td class="px-5 py-4">
                                        @if ($doc->is_active && (!$doc->expires_at || !$doc->expires_at->isPast()))
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 border border-emerald-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Permission Granted
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-50 px-3 py-1 text-xs font-bold text-rose-700 border border-rose-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                                Access Revoked
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4 font-bold text-sky-700">{{ $doc->view_count }}</td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <div x-on:click="showQr = true" class="cursor-pointer rounded-xl border border-slate-200 p-1 transition hover:border-sky-500 hover:shadow-md" title="Click to view large QR Code">
                                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(48)->generate($verifyUrl) !!}
                                            </div>
                                            <button type="button" x-on:click="showQr = true" class="text-xs font-bold text-sky-700 hover:underline">
                                                Expand QR
                                            </button>
                                        </div>

                                        {{-- QR Code Modal --}}
                                        <div x-show="showQr" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 p-4 backdrop-blur-sm">
                                            <div x-on:click.outside="showQr = false" class="w-full max-w-sm rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-2xl">
                                                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                                    <p class="text-xs font-bold uppercase tracking-wider text-sky-700">Official Verification QR</p>
                                                    <button type="button" x-on:click="showQr = false" class="text-slate-400 hover:text-slate-950 text-lg font-bold">&times;</button>
                                                </div>

                                                <div class="mt-4 flex justify-center p-3 bg-slate-50 rounded-2xl border border-slate-100">
                                                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(220)->generate($verifyUrl) !!}
                                                </div>

                                                <h3 class="mt-4 font-bold text-slate-950 text-base">{{ $doc->title }}</h3>
                                                <p class="text-xs text-slate-500">{{ $doc->applicant_name }} &middot; {{ $doc->document_type }}</p>
                                                
                                                <div class="mt-4 flex flex-col gap-2">
                                                    <button type="button" 
                                                            x-on:click="navigator.clipboard.writeText('{{ $verifyUrl }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-100 px-4 py-2.5 text-xs font-bold text-slate-800 hover:bg-slate-200 transition">
                                                        <span x-text="copied ? 'Link Copied to Clipboard!' : 'Copy Verification Link'"></span>
                                                    </button>

                                                    <a href="{{ $verifyUrl }}" target="_blank" class="inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-xs font-bold text-white hover:bg-sky-700 transition">
                                                        Test Verification Link
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex flex-col gap-2">
                                            <form action="{{ route('admin.doc.toggle', $doc->id) }}" method="POST">
                                                @csrf
                                                <button class="w-full rounded-xl border px-3 py-1.5 text-xs font-bold transition {{ $doc->is_active ? 'border-amber-200 bg-amber-50 text-amber-800 hover:bg-amber-100' : 'border-emerald-200 bg-emerald-50 text-emerald-700 hover:bg-emerald-100' }}">
                                                    {{ $doc->is_active ? 'Revoke Permission' : 'Grant Permission' }}
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.doc.soft_delete', $doc->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Soft delete this document? The file will stay in server storage, but verification link will be disabled.')" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-100 transition">
                                                    Soft Delete
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.doc.force_delete', $doc->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('PERMANENTLY DELETE document? This will delete the database record AND remove the file from server storage!')" class="w-full rounded-xl border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">
                                                    Hard Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-12 text-center text-sm text-slate-500">No documents issued yet. Upload one to create its QR link.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        @if ($trashedCount > 0)
            <section class="mt-8 overflow-hidden rounded-2xl border border-amber-200 bg-white shadow-sm">
                <div class="flex flex-col gap-3 border-b border-amber-100 bg-amber-50/50 p-6 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-amber-950 flex items-center gap-2">
                            <svg class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                            Trashed Documents (Soft-Deleted)
                        </h2>
                        <p class="mt-1 text-sm text-amber-800">These documents are soft-deleted. Verification links are disabled, but the physical files are still stored safely on the server.</p>
                    </div>
                    <span class="rounded-xl bg-amber-100 px-3 py-1.5 text-xs font-bold text-amber-900">{{ $trashedCount }} in trash</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-[760px] w-full text-left text-sm">
                        <thead class="bg-amber-50/30 text-xs font-bold uppercase tracking-[0.08em] text-amber-800">
                            <tr>
                                <th class="px-5 py-4">Document Details</th>
                                <th class="px-5 py-4">Deleted Date</th>
                                <th class="px-5 py-4">Storage File</th>
                                <th class="px-5 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-amber-100/50">
                            @foreach ($trashedDocuments as $doc)
                                <tr>
                                    <td class="px-5 py-4">
                                        <p class="font-bold text-slate-900">{{ $doc->title }}</p>
                                        <p class="mt-0.5 text-xs text-slate-500">{{ $doc->applicant_name }} &middot; {{ $doc->document_type }}</p>
                                        <p class="mt-1 font-mono text-[11px] text-slate-400">UUID: {{ $doc->uuid }}</p>
                                    </td>
                                    <td class="px-5 py-4 text-xs font-semibold text-amber-900">
                                        {{ $doc->deleted_at ? $doc->deleted_at->format('M d, Y H:i') : 'N/A' }}
                                    </td>
                                    <td class="px-5 py-4 text-xs font-mono text-slate-500">
                                        {{ $doc->file_path }}
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('admin.doc.restore', $doc->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="rounded-xl border border-emerald-300 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700 hover:bg-emerald-100 transition">
                                                    Restore
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.doc.force_delete', $doc->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Permanently delete record AND delete physical file from server storage?')" class="rounded-xl border border-rose-300 bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700 hover:bg-rose-100 transition">
                                                    Hard Delete (Remove File)
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endif
    </div>
</section>
@endsection
