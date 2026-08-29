<nav x-data="{ scrolled: false, mobileOpen: false }"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
     :class="scrolled ? 'bg-white/95 backdrop-blur-[12px] shadow-[0_2px_20px_rgba(0,0,0,0.08)] py-2.5' : 'bg-white py-4'"
     class="fixed top-0 left-0 w-full z-50 transition-transform duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-2.5 no-underline shrink min-w-0">
                @php $logoImage = setting('logo_image'); $logoSiteName = setting('site_name', 'INOWEB'); $siteTagline = setting('site_tagline', 'INOVASI WEBSITE'); @endphp
                @if($logoImage)
                <img src="{{ asset($logoImage) }}" alt="{{ $logoSiteName }}" class="h-8 sm:h-10 w-auto shrink-0">
                @else
                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white text-base sm:text-xl shrink-0">
                    {!! setting('logo_icon') ?: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sm:w-5 sm:h-5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>' !!}
                </div>
                @endif
                <div class="min-w-0">
                    @if($logoImage)
                    <span class="text-base sm:text-lg font-bold text-[#0f172a] tracking-wide truncate block">{{ $logoSiteName }}</span>
                    @else
                    <span class="text-base sm:text-lg font-bold text-[#0f172a] tracking-wide truncate block">{{ $logoSiteName }}</span>
                    @endif
                    <small class="max-sm:hidden block text-[0.65rem] tracking-[2px] text-blue-600 font-semibold leading-none truncate">{{ $siteTagline }}</small>
                </div>
            </a>

            <button @click="mobileOpen = !mobileOpen" class="lg:hidden shrink-0 min-w-[44px] min-h-[40px] flex items-center justify-center text-[#1e293b]" aria-label="Buka menu navigasi" :aria-expanded="mobileOpen">
                <svg x-show="!mobileOpen" x-cloak aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                <svg x-show="mobileOpen" x-cloak aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>

            <div class="hidden lg:flex items-center gap-1">
                <div class="flex items-center gap-1">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Beranda</a>
                    <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" {{ request()->routeIs('portfolio*') ? 'aria-current="page"' : '' }}>Portofolio</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>Tentang</a>
                    <a href="{{ route('faq') }}" class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" {{ request()->routeIs('faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" {{ request()->routeIs('contact') ? 'aria-current="page"' : '' }}>Kontak</a>
                </div>
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20pembuatan%20website" target="_blank" rel="noopener"
                   class="ml-3 bg-blue-600 text-white px-5 py-2.5 rounded-full text-sm font-semibold no-underline transition-all duration-300 hover:bg-blue-700 hover:-translate-y-0.5 hover:shadow-[0_4px_20px_rgba(37,99,235,0.3)] inline-flex items-center gap-1.5">
                    Konsultasi Gratis
                </a>
            </div>

            <div x-show="mobileOpen" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="lg:hidden fixed top-[64px] left-0 w-full bg-white backdrop-blur-[20px] pb-6 pt-4 px-4 shadow-xl border-t border-gray-100"
                 @click.outside="mobileOpen = false">
                <div class="flex flex-col gap-1">
                    <a href="{{ url('/') }}" class="block px-4 py-3 text-[#1e293b] no-underline font-medium rounded-lg hover:bg-gray-50 transition-colors" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Beranda</a>
                    <a href="{{ route('portfolio') }}" class="block px-4 py-3 text-[#1e293b] no-underline font-medium rounded-lg hover:bg-gray-50 transition-colors" {{ request()->routeIs('portfolio*') ? 'aria-current="page"' : '' }}>Portofolio</a>
                    <a href="{{ route('about') }}" class="block px-4 py-3 text-[#1e293b] no-underline font-medium rounded-lg hover:bg-gray-50 transition-colors" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>Tentang</a>
                    <a href="{{ route('faq') }}" class="block px-4 py-3 text-[#1e293b] no-underline font-medium rounded-lg hover:bg-gray-50 transition-colors" {{ request()->routeIs('faq') ? 'aria-current="page"' : '' }}>FAQ</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 text-[#1e293b] no-underline font-medium rounded-lg hover:bg-gray-50 transition-colors" {{ request()->routeIs('contact') ? 'aria-current="page"' : '' }}>Kontak</a>
                    <div class="pt-2 px-4">
                        <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20pembuatan%20website" target="_blank" rel="noopener" class="block w-full text-center bg-blue-600 text-white px-5 py-3 rounded-full text-sm font-semibold no-underline hover:bg-blue-700 transition-colors">Konsultasi Gratis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
