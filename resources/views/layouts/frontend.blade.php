<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', setting('site_name', 'INOWEB') . ' - ' . setting('site_tagline', 'Pusat Website Profesional'))</title>
    <meta name="description" content="@yield('meta_description', setting('site_description', 'INOWEB - Pusat layanan pembuatan website profesional. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @php $favicon = setting('favicon'); @endphp
    @if($favicon)
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}">
    <link rel="shortcut icon" href="{{ $favicon }}">
    <link rel="apple-touch-icon" href="{{ $favicon }}">
    @else
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect x='4' y='6' width='24' height='18' rx='3' fill='%232563eb'/><rect x='12' y='24' width='8' height='3' fill='%232563eb'/><rect x='14' y='27' width='4' height='3' fill='%232563eb'/></svg>">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans text-[#1a1a2e] overflow-x-hidden">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    <a href="https://wa.me/6281234567890" target="_blank"
       class="fixed bottom-6 right-6 w-14 h-14 bg-[#25d366] rounded-full flex items-center justify-center text-white text-3xl shadow-[0_4px_20px_rgba(37,211,102,0.4)] z-50 transition-all duration-300 hover:scale-110 hover:shadow-[0_6px_30px_rgba(37,211,102,0.5)]">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 100 });
    </script>
    @stack('scripts')
</body>
</html>
