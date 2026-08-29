<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', setting('site_name', 'INOWEB') . ' - ' . setting('site_tagline', 'Inovasi Website'))</title>
    <meta name="description" content="@yield('meta_description', setting('site_description', 'INOWEB - Inovasi Website. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.'))">

    @php
        $ogImage = setting('og_image') ? url(setting('og_image')) : url(setting('logo_image', '/images/og-default.png'));
        $ogTitle = trim(strip_tags((string) View::yieldContent('title', setting('site_name', 'INOWEB') . ' - ' . setting('site_tagline', 'Inovasi Website'))));
        $ogDesc = trim(strip_tags((string) View::yieldContent('meta_description', setting('site_description', 'INOWEB - Inovasi Website.'))));
    @endphp
    <meta property="og:site_name" content="{{ setting('site_name', 'INOWEB') }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDesc }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDesc }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @php $faviconVersion = md5(setting('favicon') ?: setting('logo_image')); @endphp
    <link rel="icon" type="image/png" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    <link rel="shortcut icon" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    @if(setting('logo_image'))
    <link rel="apple-touch-icon" href="{{ asset(setting('logo_image')) }}">
    @else
    <link rel="apple-touch-icon" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    @endif

    <style>[x-cloak] { display: none !important; }</style>

    <script type="application/ld+json">
    @php
        $sameAs = array_values(array_filter([
            setting('social_facebook', ''),
            setting('social_instagram', ''),
            setting('social_linkedin', ''),
            setting('social_youtube', ''),
        ]));
        $org = [
            '@type' => 'Organization',
            '@id' => url('/') . '#organization',
            'name' => setting('site_name', 'INOWEB'),
            'url' => url('/'),
            'description' => setting('site_description', 'INOWEB - Inovasi Website. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.'),
            'logo' => setting('logo_image') ? url(setting('logo_image')) : '',
            'sameAs' => $sameAs,
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+' . setting('whatsapp_number', '6285736186308'),
                'contactType' => 'customer service',
            ],
        ];
        $web = [
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'url' => url('/'),
            'name' => setting('site_name', 'INOWEB'),
            'inLanguage' => 'id-ID',
            'publisher' => ['@id' => url('/') . '#organization'],
        ];
    @endphp
    {!! json_encode(['@context' => 'https://schema.org', '@graph' => [$org, $web]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans text-[#1a1a2e] overflow-x-hidden">

    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[200] focus:bg-blue-600 focus:text-white focus:px-5 focus:py-3 focus:rounded-xl focus:font-semibold focus:text-sm focus:shadow-lg">
        Langsung ke konten
    </a>

    <x-navbar />

    <main id="main-content" class="w-full">
        @yield('content')
    </main>

    <x-footer />

    <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text={{ urlencode('Halo INOWEB, saya ingin konsultasi website') }}" target="_blank" rel="noopener"
       class="fixed bottom-6 right-6 z-50 no-underline group"
       aria-label="Chat via WhatsApp">
        <span class="relative flex shrink-0">
            <span class="absolute inset-0 rounded-full bg-green-500/40 wa-glow"></span>
            <img src="/images/wa.png" alt="WhatsApp" width="56" height="56" class="block relative rounded-full shadow-lg wa-img">
        </span>
    </a>

    <!-- Back to top -->
    <div x-data="{ show: false }" x-init="window.addEventListener('scroll', () => show = window.scrollY > 400, { passive: true })">
        <button type="button"
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                x-show="show" x-cloak
                aria-label="Kembali ke atas"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2"
                class="fixed bottom-24 right-6 z-50 w-11 h-11 rounded-full bg-white/95 backdrop-blur border border-gray-200 text-[#1e293b] flex items-center justify-center shadow-lg hover:bg-blue-600 hover:text-white hover:-translate-y-0.5 transition-all cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="18 15 12 9 6 15"/></svg>
        </button>
    </div>

    <!-- Toast Notification -->
    <div x-data="{
        notif: {!! json_encode(
            session('success') ? ['msg' => session('success'), 'type' => 'success'] 
            : (session('error') ? ['msg' => session('error'), 'type' => 'error'] 
            : (session('warning') ? ['msg' => session('warning'), 'type' => 'warning'] 
            : (session('info') ? ['msg' => session('info'), 'type' => 'info'] 
             : null )))
        , JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
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
             'bg-emerald-500/90': notif?.type === 'success',
             'bg-red-500/90': notif?.type === 'error',
             'bg-amber-500/90': notif?.type === 'warning',
             'bg-blue-500/90': notif?.type === 'info'
         }">
        <template x-if="notif?.type === 'success'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </template>
        <template x-if="notif?.type === 'error'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        </template>
        <template x-if="notif?.type === 'warning'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </template>
        <template x-if="notif?.type === 'info'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </template>
        <span x-text="notif?.msg"></span>
        <button @click="notif = null" class="ml-1 text-white/80 hover:text-white">&times;</button>
    </div>

    @stack('scripts')
</body>
</html>
