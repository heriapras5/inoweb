<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', setting('site_name', 'INOWEB') . ' - ' . setting('site_tagline', 'Inovasi Website'))</title>
    <meta name="description" content="@yield('meta_description', setting('site_description', 'INOWEB - Inovasi Website. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @php $favicon = setting('favicon'); @endphp
    @if($favicon)
    <link rel="icon" type="image/x-icon" href="{{ asset($favicon) }}">
    <link rel="shortcut icon" href="{{ asset($favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset($favicon) }}">
    @else
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect x='4' y='6' width='24' height='18' rx='3' fill='%232563eb'/><rect x='12' y='24' width='8' height='3' fill='%232563eb'/><rect x='14' y='27' width='4' height='3' fill='%232563eb'/></svg>">
    @endif

    <style>[x-cloak] { display: none !important; }</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans text-[#1a1a2e] overflow-x-hidden">

    <x-navbar />

    <main class="w-full">
        @yield('content')
    </main>

    <x-footer />

    <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}" target="_blank"
       class="whatsapp-float fixed bottom-6 right-6 w-auto h-auto rounded-full flex items-center justify-center shadow-[0_4px_20px_rgba(0,0,0,0.15)] z-50 transition-all duration-300 hover:scale-110 hover:shadow-[0_6px_30px_rgba(0,0,0,0.25)]" aria-label="Chat via WhatsApp">
        <span class="whatsapp-pulse"></span>
        <img src="/images/wa.png" alt="WhatsApp" width="56" height="56" class="block relative">
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Toast Notification -->
    <div x-data="{
        notif: {{ 
            session('success') ? json_encode(['msg' => session('success'), 'type' => 'success']) 
            : (session('error') ? json_encode(['msg' => session('error'), 'type' => 'error']) 
            : (session('warning') ? json_encode(['msg' => session('warning'), 'type' => 'warning']) 
            : (session('info') ? json_encode(['msg' => session('info'), 'type' => 'info']) 
            : 'null' )))
        }
    }" x-init="if (notif) { setTimeout(() => notif = null, 4000) }"
         x-show="notif" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed top-20 right-4 z-[100] backdrop-blur-md text-white px-5 py-3 rounded-xl shadow-xl text-sm flex items-center gap-2.5 max-w-sm"
         :class="{
             'bg-emerald-500/90': notif.type === 'success',
             'bg-red-500/90': notif.type === 'error',
             'bg-amber-500/90': notif.type === 'warning',
             'bg-blue-500/90': notif.type === 'info'
         }">
        <template x-if="notif.type === 'success'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </template>
        <template x-if="notif.type === 'error'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        </template>
        <template x-if="notif.type === 'warning'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </template>
        <template x-if="notif.type === 'info'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </template>
        <span x-text="notif?.msg"></span>
        <button @click="notif = null" class="ml-1 text-white/80 hover:text-white">&times;</button>
    </div>

    @stack('scripts')
</body>
</html>
