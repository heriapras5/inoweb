<footer class="bg-[#0a192f] pt-20 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12">
            <div class="lg:col-span-1">
                @php $logoImage = setting('logo_image'); $logoSiteName = setting('site_name', 'INOWEB'); $siteTagline = setting('site_tagline', 'PUSAT WEBSITE'); @endphp
                <div class="flex items-center gap-2 mb-4">
                    @if($logoImage)
                    <img src="{{ $logoImage }}" alt="{{ $logoSiteName }}" class="h-10 w-auto">
                    @else
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl">
                        {!! setting('logo_icon') ?: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>' !!}
                    </div>
                    @endif
                    <div>
                        <span class="text-white font-bold text-lg tracking-wide">{{ $logoSiteName }}</span>
                        <small class="block text-[0.6rem] tracking-[2px] text-white/50 leading-none">{{ $siteTagline }}</small>
                    </div>
                </div>
                <p class="text-white/60 text-sm leading-relaxed mb-4">
                    {{ setting('site_description', 'INOWEB adalah pusat layanan pembuatan website profesional yang membantu bisnis Anda tampil lebih percaya diri, menarik pelanggan, dan berkembang lebih cepat di era digital.') }}
                </p>
                <div class="flex gap-2.5">
                    <a href="#" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="#" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                    <a href="#" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                    <a href="#" class="footer-social"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg></a>
                </div>
            </div>
            <div>
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
            <div>
                <h6 class="footer-title">Tautan</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('services') }}">Layanan</a></li>
                    <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Jl. Digital Innovation No. 10 Yogyakarta, Indonesia</span>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>+62 812-3456-7890</span>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <span>info@inoweb.id</span>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>Senin - Sabtu: 08.00 - 17.00</span>
                    </li>
                </ul>
            </div>
            <div>
                <h6 class="footer-title">Newsletter</h6>
                <p class="text-white/60 text-sm leading-relaxed mb-4">Dapatkan tips dan informasi terbaru seputar website dan digital bisnis.</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex">
                    @csrf
                    <input type="email" name="email" placeholder="Masukkan email Anda" required
                           class="flex-1 bg-white/10 border border-white/20 text-white text-sm px-4 py-2.5 rounded-l-lg outline-none focus:border-blue-600 placeholder:text-white/40">
                    <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg hover:bg-blue-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </form>
            </div>
        </div>
        <hr class="border-white/10 my-12">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/40 text-sm">&copy; {{ date('Y') }} {{ setting('site_name', 'INOWEB') }} - {{ setting('site_tagline', 'Pusat Website') }}. All Rights Reserved.</p>
            <div class="flex items-center gap-3 text-white/40 text-sm">
                <a href="{{ route('privacy') }}" class="footer-bottom-link">Kebijakan Privasi</a>
                <span class="text-white/20">|</span>
                <a href="{{ route('terms') }}" class="footer-bottom-link">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
