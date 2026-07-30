<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Secure QR-based visa and immigration document verification.">
    <meta name="theme-color" content="#0f172a">
    <link rel="icon" type="image/png" href='<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 3 4.5 6.3v5.2c0 4.7 3.2 8.9 7.5 9.9 4.3-1 7.5-5.2 7.5-9.9V6.3L12 3Z"></path>
                    <path d="m8.8 12 2.1 2.1 4.5-4.7"></path>
                </svg>'>
    <title>@yield('title', $siteSettings->site_title ?? 'EsewaPunjab | Secure document verification')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
