<footer class="bg-[#0a192f] pt-16 sm:pt-20 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <!-- Brand -->
            <div class="col-span-2 lg:col-span-1 text-left">
                @php $logoImage = setting('logo_image'); $logoSiteName = setting('site_name', 'INOWEB'); $siteTagline = setting('site_tagline', 'Inovasi Website'); @endphp
                <div class="inline-flex items-center gap-2.5 mb-4">
                    @if($logoImage)
                    <img src="{{ asset($logoImage) }}" alt="{{ $logoSiteName }}" class="h-8 sm:h-10 w-auto shrink-0">
                    @else
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white text-base sm:text-xl shrink-0">
                        {!! setting('logo_icon') ?: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>' !!}
                    </div>
                    @endif
                    <div class="text-left">
                        <span class="text-base sm:text-lg font-bold text-white tracking-wide">{{ $logoSiteName }}</span>
                        <small class="block text-[0.6rem] tracking-[2px] text-blue-400 leading-none">{{ $siteTagline }}</small>
                    </div>
                </div>
                <p class="text-white/60 text-sm leading-relaxed mb-4 max-w-xs lg:max-w-none">
                    {{ setting('site_description', 'INOWEB adalah solusi pembuatan website profesional yang membantu bisnis Anda tampil lebih percaya diri, menarik pelanggan, dan berkembang lebih cepat di era digital.') }}
                </p>
                <div class="flex justify-start gap-2.5">
                    <a href="{{ setting('social_facebook', '#') }}" target="_blank" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="{{ setting('social_instagram', '#') }}" target="_blank" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                    <a href="{{ setting('social_linkedin', '#') }}" target="_blank" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                    <a href="{{ setting('social_youtube', '#') }}" target="_blank" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg></a>
                </div>
            </div>

            <!-- Layanan -->
            <div class="text-left">
                <h6 class="footer-title">Layanan</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('services') }}">Company Profile</a></li>
                    <li><a href="{{ route('services') }}">Katalog Produk</a></li>
                    <li><a href="{{ route('services') }}">Website UMKM</a></li>
                    <li><a href="{{ route('services') }}">Sistem Management</a></li>
                    <li><a href="{{ route('services') }}">Custom Website</a></li>
                    <li><a href="{{ route('services') }}">Landing Page</a></li>
                </ul>
            </div>

            <!-- Navigasi -->
            <div class="text-left">
                <h6 class="footer-title">Navigasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('services') }}">Layanan</a></li>
                    <li><a href="{{ route('portfolio') }}">Projek</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-span-2 lg:col-span-1 text-left">
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    @php $wa = setting('whatsapp_number', '6283114445775'); @endphp
                    @if(setting('footer_address'))
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>{{ setting('footer_address') }}</span>
                    </li>
                    @endif
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <a href="https://wa.me/{{ $wa }}" target="_blank" class="hover:text-blue-400 transition-colors">{{ $wa }}</a>
                    </li>
                    @if(setting('footer_email'))
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <a href="mailto:{{ setting('footer_email') }}" class="hover:text-blue-400 transition-colors">{{ setting('footer_email') }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <hr class="border-white/10 my-8 sm:my-12">
        <div class="flex flex-col items-center gap-2 text-center">
            <p class="text-white/40 text-sm">&copy; {{ date('Y') }} {{ setting('site_name', 'INOWEB') }} - {{ setting('site_tagline', 'Inovasi Website') }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
