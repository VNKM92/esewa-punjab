@extends('layouts.app')

@section('content')
<!-- Dynamic Hero Banner / Slider -->
<section class="relative bg-gradient-to-b from-sky-50/50 to-white pt-12 pb-20 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      
      <!-- Left Column: Copy -->
      <div class="space-y-6">
        <span class="px-4 py-1.5 rounded-full text-xs font-semibold bg-sky-100 text-sky-700 border border-sky-200">
          Verified Global Migration Services
        </span>
        <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
          Secure Visa Verification & <span class="bg-gradient-to-r from-sky-600 to-indigo-600 bg-clip-text text-transparent">Global Mobility</span>
        </h1>
        <p class="text-lg text-slate-600 leading-relaxed">
          Authenticate marriage certificates, identity proofs, and migration permits instantly with secure QR tokenization.
        </p>
        <div class="flex flex-wrap gap-4 pt-4">
          <a href="{{ route('contact') }}" class="px-6 py-3.5 rounded-xl bg-slate-900 text-white font-medium hover:bg-slate-800 transition-all shadow-lg">
            Get Started
          </a>
        </div>
      </div>

      <!-- Right Column: Interactive Card Stack with Animations -->
      <div class="relative">
        <div class="relative mx-auto w-full max-w-md bg-white p-6 rounded-2xl shadow-2xl border border-slate-100 animate-bounce-slow">
          <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div>
              <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Document Token</p>
              <h3 class="font-bold text-slate-800">Marriage Certificate Verification</h3>
            </div>
            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full">Active</span>
          </div>

          <!-- Sample QR Render -->
          <div class="my-6 flex justify-center p-4 bg-slate-50 rounded-xl border border-dashed border-slate-200">
            {!! QrCode::size(160)->generate(url('/verify/sample-uuid-token')) !!}
          </div>

          <p class="text-xs text-center text-slate-500">
            Scan to view official attested documents with 2FA Captcha verification.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Cards Section -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-2xl mx-auto mb-16">
      <h2 class="text-3xl font-bold text-slate-900">Supported Document Verifications</h2>
      <p class="text-slate-600 mt-2">Instant authentication for legal migration workflows.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="p-8 rounded-2xl bg-gradient-to-b from-slate-50 to-white border border-slate-200/80 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-600 flex items-center justify-center font-bold text-xl mb-6">
          💍
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-2">Marriage Certificate Proof</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Verify spousal relationship documents instantly with QR scanning integration.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="p-8 rounded-2xl bg-gradient-to-b from-slate-50 to-white border border-slate-200/80 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center font-bold text-xl mb-6">
          🛂
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-2">Work & Residency Permits</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Direct authentication tokens backed by real-time validation checks.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="p-8 rounded-2xl bg-gradient-to-b from-slate-50 to-white border border-slate-200/80 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold text-xl mb-6">
          🛡️
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-2">Security & Access Control</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Enable or disable QR links at any time directly from the admin console.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection