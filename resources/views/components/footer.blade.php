<footer class="bg-[#0a192f] pt-16 sm:pt-20 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
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
                    @php $wa = setting('whatsapp_number', '6285736186308'); $waDisplay = preg_replace('/^62/', '0', $wa); @endphp
                    @if(setting('footer_address'))
                    <li>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>{{ setting('footer_address') }}</span>
                    </li>
                    @endif
                    <li>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener" class="hover:text-blue-400 transition-colors">{{ $waDisplay }}</a>
                    </li>
                    @if(setting('footer_email'))
                    <li>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <a href="mailto:{{ setting('footer_email') }}" class="hover:text-blue-400 transition-colors">{{ setting('footer_email') }}</a>
                    </li>
                    @endif
                </ul>
                @php
                    $_socials = [
                        ['label' => 'Facebook',  'url' => setting('social_facebook')],
                        ['label' => 'Instagram', 'url' => setting('social_instagram')],
                        ['label' => 'LinkedIn',  'url' => setting('social_linkedin')],
                        ['label' => 'YouTube',   'url' => setting('social_youtube')],
                    ];
                    $_socials = array_values(array_filter($_socials, fn($s) => !empty($s['url']) && $s['url'] !== '#'));
                @endphp
                @if(count($_socials))
                <div class="mt-6">
                    <h6 class="footer-title">Sosial Media</h6>
                    <ul class="footer-links">
                        @foreach($_socials as $_s)
                        <li><a href="{{ $_s['url'] }}" target="_blank" rel="noopener" class="hover:text-blue-400 transition-colors">{{ $_s['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <hr class="border-white/10 my-8 sm:my-12">
        <div class="flex flex-col items-center gap-2 text-center">
            <p class="text-white/40 text-sm">&copy; {{ date('Y') }} {{ setting('site_name', 'INOWEB') }} - {{ setting('site_tagline', 'Inovasi Website') }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
