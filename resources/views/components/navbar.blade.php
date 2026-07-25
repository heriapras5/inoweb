<nav x-data="{ scrolled: false, mobileOpen: false }"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
     :class="(scrolled || mobileOpen) ? 'bg-[rgba(10,25,47,0.95)] backdrop-blur-[20px] shadow-[0_2px_20px_rgba(0,0,0,0.3)] py-2.5' : 'bg-transparent py-4'"
     class="fixed top-0 left-0 w-full z-50 transition-all duration-300 max-lg:bg-[rgba(10,25,47,0.92)] max-lg:backdrop-blur-[20px] max-lg:py-2.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2 no-underline">
                @php $logoImage = setting('logo_image'); $logoSiteName = setting('site_name', 'INOWEB'); $siteTagline = setting('site_tagline', 'PUSAT WEBSITE'); @endphp
                @if($logoImage)
                <img src="{{ $logoImage }}" alt="{{ $logoSiteName }}" class="h-10 w-auto">
                @else
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl">
                    {!! setting('logo_icon') ?: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>' !!}
                </div>
                @endif
                <div>
                    @if($logoImage)
                    <span class="text-lg font-bold text-white tracking-wide">{{ $logoSiteName }}</span>
                    @else
                    <span class="text-lg font-bold text-white tracking-wide">{!! nl2br(e($logoSiteName)) !!}</span>
                    @endif
                    <small class="block text-[0.6rem] tracking-[2px] text-white/60 leading-none">{{ $siteTagline }}</small>
                </div>
            </a>

            <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-white/80 p-2">
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>

            <div class="hidden lg:flex items-center gap-1">
                <div class="flex items-center gap-1">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Beranda</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" {{ request()->routeIs('services') ? 'aria-current="page"' : '' }}>Layanan</a>
                    <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" {{ request()->routeIs('portfolio*') ? 'aria-current="page"' : '' }}>Portofolio</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>Tentang Kami</a>
                    <a href="{{ route('faq') }}" class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" {{ request()->routeIs('faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" {{ request()->routeIs('contact') ? 'aria-current="page"' : '' }}>Kontak</a>
                </div>
                <a href="https://wa.me/6281234567890" target="_blank"
                   class="ml-3 bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold no-underline transition-all duration-300 hover:bg-blue-700 hover:-translate-y-0.5 hover:shadow-[0_4px_20px_rgba(37,99,235,0.3)]">
                    Pesan via WhatsApp
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline ml-1"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <div x-show="mobileOpen" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="lg:hidden fixed top-[72px] left-0 w-full bg-[rgba(10,25,47,0.98)] backdrop-blur-[20px] pb-6 pt-4 px-4 shadow-xl"
                 @click.outside="mobileOpen = false">
                <div class="flex flex-col gap-2">
                    <a href="{{ url('/') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Beranda</a>
                    <a href="{{ route('services') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('services') ? 'aria-current="page"' : '' }}>Layanan</a>
                    <a href="{{ route('portfolio') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('portfolio*') ? 'aria-current="page"' : '' }}>Portofolio</a>
                    <a href="{{ route('about') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>Tentang Kami</a>
                    <a href="{{ route('faq') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-white/80 no-underline font-medium rounded-lg hover:bg-white/5 transition-colors" {{ request()->routeIs('contact') ? 'aria-current="page"' : '' }}>Kontak</a>
                    <div class="pt-2 px-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="block w-full text-center bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold no-underline hover:bg-blue-700 transition-colors">Pesan via WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
