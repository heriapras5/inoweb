@extends('layouts.frontend')

@section('content')
<!-- Hero -->
<section class="bg-gradient-hero min-h-screen relative overflow-hidden pt-20 flex items-center">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute w-px h-3/5 top-1/5 left-1/5 bg-blue-600/10"></div>
        <div class="absolute w-px h-2/5 top-1/3 right-1/4 bg-blue-600/10"></div>
        <div class="absolute w-2/5 h-px top-1/2 left-1/3 bg-blue-600/10"></div>
        <div class="absolute w-1.5 h-1.5 bg-blue-600/50 rounded-full top-1/4 left-[18%]"></div>
        <div class="absolute w-1.5 h-1.5 bg-blue-600/50 rounded-full top-[45%] right-[23%]"></div>
        <div class="absolute w-1.5 h-1.5 bg-blue-600/50 rounded-full bottom-[30%] left-[40%]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-80px)]">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-badge mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    PUSAT WEBSITE PROFESIONAL
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-[3.2rem] font-extrabold text-white leading-tight mb-5">
                    Solusi Website Profesional untuk Bisnis <span class="text-gradient">Modern</span>
                </h1>
                <p class="text-[#8892b0] text-base sm:text-lg leading-relaxed mb-8 max-w-lg">
                    INOWEB membantu bisnis Anda tampil lebih profesional, menarik pelanggan, dan berkembang lebih cepat di era digital dengan website modern, cepat, dan mudah dikelola.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn-primary px-6 py-3 text-base">
                        Pesan via WhatsApp
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn-outline-light px-6 py-3 text-base">
                        Lihat Portofolio
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </a>
                </div>
                <div class="flex flex-wrap gap-x-6 gap-y-3">
                    <div class="flex items-center gap-2 text-[#ccd6f6] text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r="0.5" fill="currentColor"/><circle cx="17.5" cy="10.5" r="0.5" fill="currentColor"/><circle cx="8.5" cy="7.5" r="0.5" fill="currentColor"/><circle cx="6.5" cy="12.5" r="0.5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg><span>Desain Modern & Responsif</span></div>
                    <div class="flex items-center gap-2 text-[#ccd6f6] text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20v-6M6 20V10M18 20V4"/></svg><span>Performa Cepat & SEO Friendly</span></div>
                    <div class="flex items-center gap-2 text-[#ccd6f6] text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><span>Aman & Terpercaya</span></div>
                    <div class="flex items-center gap-2 text-[#ccd6f6] text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><span>Support Cepat & Ramah</span></div>
                </div>
            </div>
                <div class="hidden lg:block relative py-10" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="mockup-main transition-all duration-300 hover:!rotate-y-0 hover:!rotate-x-0">
                    <div class="bg-[#1a1a2e] px-4 py-2.5 flex gap-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-500"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                    </div>
                    <div class="p-8 bg-gradient-to-b from-[#0f2744] to-[#0a192f]">
                        <div class="h-3 bg-white/10 rounded-full w-3/4 mb-2"></div>
                        <div class="h-3 bg-white/10 rounded-full w-1/2 mb-3"></div>
                        <div class="w-[120px] h-9 bg-blue-600 rounded-lg mt-2.5"></div>
                    </div>
                </div>
                <div class="absolute top-[10%] -right-[10%] animate-float">
                    <div class="bg-[rgba(17,34,64,0.95)] border border-blue-600/20 rounded-xl px-4 py-3 flex items-center gap-2.5 backdrop-blur-[10px] shadow-[0_10px_30px_rgba(0,0,0,0.3)]">
                        <div class="w-9 h-9 bg-blue-600/20 rounded-lg flex items-center justify-center text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
                        <div><div class="h-2.5 bg-white/10 rounded-full w-[4.5rem] mb-1"></div><div class="h-2 bg-white/10 rounded-full w-[3rem]"></div></div>
                    </div>
                </div>
                <div class="absolute bottom-[30%] -left-[5%] animate-float-delay-1">
                    <div class="bg-[rgba(17,34,64,0.95)] border border-blue-600/20 rounded-xl px-4 py-3 flex items-center gap-2.5 backdrop-blur-[10px] shadow-[0_10px_30px_rgba(0,0,0,0.3)]">
                        <div class="w-9 h-9 bg-blue-600/20 rounded-lg flex items-center justify-center text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12" y2="18"/></svg></div>
                        <div><div class="h-2.5 bg-white/10 rounded-full w-[4.5rem] mb-1"></div><div class="h-2 bg-white/10 rounded-full w-[3rem]"></div></div>
                    </div>
                </div>
                <div class="absolute bottom-[5%] right-[5%] animate-float-delay-2">
                    <div class="bg-[rgba(17,34,64,0.95)] border border-blue-600/20 rounded-xl px-4 py-3 flex items-center gap-2.5 backdrop-blur-[10px] shadow-[0_10px_30px_rgba(0,0,0,0.3)]">
                        <div class="w-9 h-9 bg-blue-600/20 rounded-lg flex items-center justify-center text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
                        <div><div class="h-2.5 bg-white/10 rounded-full w-[4.5rem] mb-1"></div><div class="h-2 bg-white/10 rounded-full w-[3rem]"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan -->
<section class="py-24 bg-white" id="layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center mb-16">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">LAYANAN KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Layanan Lengkap untuk Kebutuhan <span class="text-blue-600">Website</span> Anda</h2>
                <p class="text-[#64748b] text-base leading-relaxed mt-3">Kami menyediakan berbagai solusi website yang dirancang khusus sesuai kebutuhan bisnis Anda.</p>
            </div>
            <div class="text-right" data-aos="fade-left">
                <a href="{{ route('services') }}" class="btn-outline-dark px-6 py-3 text-base">Lihat Semua Layanan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="service-icon">{!! $service->icon !!}</div>
                <h5 class="text-lg font-bold text-[#1a1a2e] mb-2.5">{{ $service->title }}</h5>
                <p class="text-sm text-[#64748b] leading-relaxed mb-4">{{ $service->description }}</p>
                <a href="{{ route('services') }}" class="text-blue-600 font-semibold text-sm no-underline inline-flex items-center gap-1.5 hover:gap-2.5 transition-all">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Portfolio -->
<section class="py-24 bg-gray-50" id="portofolio">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center mb-16">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PORTOFOLIO KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Beberapa Hasil Karya <span class="text-blue-600">Terbaik</span> Kami</h2>
            </div>
            <div class="text-right" data-aos="fade-left">
                <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3 text-base">Lihat Semua Portofolio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $index => $project)
            <div x-data @click="window.open('{{ $project->url }}', '_blank')" class="portfolio-card cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="portfolio-img">
                    <img src="{{ $project->images->first()->image ?? '' }}" alt="{{ $project->name }}" loading="lazy">
                    <div class="absolute top-4 left-4"><span class="portfolio-badge {{ $project->badge_class }}">{{ $project->category->name }}</span></div>
                </div>
                <div class="p-5">
                    <h5 class="text-base font-bold text-[#1a1a2e] mb-3">{{ $project->name }}</h5>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ $project->url }}" target="_blank" @click.stop
                           class="inline-flex items-center gap-1 bg-blue-600 text-white text-xs px-3 py-1.5 rounded-full no-underline hover:bg-blue-700 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            Kunjungi Website
                        </a>
                        <a href="{{ route('portfolio.detail', $project->slug) }}" @click.stop
                           class="inline-flex items-center gap-1 border border-blue-600 text-blue-600 text-xs px-3 py-1.5 rounded-full no-underline hover:bg-blue-600 hover:text-white transition-all">
                            Detail
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($project->name) }}" target="_blank" @click.stop
                           class="inline-flex items-center gap-1 bg-green-500 text-white text-xs px-3 py-1.5 rounded-full no-underline hover:bg-green-600 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Proses Kerja -->
<section class="py-24 bg-white" id="proses">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center mb-16">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PROSES KERJA KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Mudah, Terstruktur & Efisien</h2>
            </div>
            <div data-aos="fade-left">
                <p class="text-[#64748b] text-base leading-relaxed lg:text-right mb-0">Kami memiliki proses kerja yang jelas untuk memastikan hasil terbaik sesuai kebutuhan Anda.</p>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <div class="process-card text-center" data-aos="fade-up">
                <div class="process-step">01</div>
                <div class="process-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                <h5 class="text-base font-bold text-[#1a1a2e] mb-2">Konsultasi</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Kami mendengarkan kebutuhan dan tujuan bisnis Anda.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="process-step">02</div>
                <div class="process-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
                <h5 class="text-base font-bold text-[#1a1a2e] mb-2">Perencanaan</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Menyusun strategi, konsep, dan solusi terbaik.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="process-step">03</div>
                <div class="process-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
                <h5 class="text-base font-bold text-[#1a1a2e] mb-2">Desain & Development</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Membuat desain menarik dan mengembangkan website.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="process-step">04</div>
                <div class="process-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="12" rx="10" ry="5"/><path d="M2 17v5M2 12v5M22 17v5M22 12v5M12 22v-4"/><path d="M18 12h.01M6 12h.01"/></svg></div>
                <h5 class="text-base font-bold text-[#1a1a2e] mb-2">Testing & Revisi</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Uji coba untuk memastikan semua berjalan sempurna.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="process-step">05</div>
                <div class="process-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v16h16"/><polyline points="20 10 12 18 8 14"/></svg></div>
                <h5 class="text-base font-bold text-[#1a1a2e] mb-2">Launch & Support</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Website siap digunakan dan kami siap mendukung Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-24 bg-white" id="testimoni">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center mb-16">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">TESTIMONI KLIEN</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Apa Kata Mereka Tentang <span class="text-blue-600">INOWEB</span>?</h2>
            </div>
            <div class="text-right" data-aos="fade-left">
                <div class="inline-flex gap-2.5">
                    <button id="prevTestimonial" class="w-11 h-11 flex items-center justify-center rounded-full border border-[#dee2e6] bg-white text-[#475569] hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <button id="nextTestimonial" class="w-11 h-11 flex items-center justify-center rounded-full border border-[#dee2e6] bg-white text-[#475569] hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-6" id="testimonialCarousel">
            @foreach($testimonials as $i => $testimonial)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="testimonial-card">
                    <div class="testimonial-stars">{{ str_repeat('★', $testimonial->rating) }}</div>
                    <p class="testimonial-text">"{{ $testimonial->quote }}"</p>
                    <div class="testimonial-author flex items-center gap-3">
                        <div class="author-avatar"><img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}"></div>
                        <div><h6 class="text-sm font-bold text-[#1a1a2e] mb-0">{{ $testimonial->name }}</h6><small class="text-[#64748b] text-xs">{{ $testimonial->role }}</small></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-gradient-blue py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center" data-aos="zoom-in">
            <div data-aos="fade-right" data-aos-delay="200">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Siap Membangun Website Profesional untuk Bisnis Anda?</h2>
                <p class="text-white/70 text-base leading-relaxed">Konsultasikan kebutuhan Anda sekarang juga dan dapatkan solusi terbaik dari tim profesional INOWEB.</p>
            </div>
            <div class="text-right" data-aos="fade-left" data-aos-delay="400">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20INOWEB" target="_blank" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Portfolio filter
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.portfolio-card').forEach((card, i) => {
                const match = filter === 'all' || card.getAttribute('data-category') === filter;
                card.parentElement.style.display = match ? 'block' : 'none';
                if (match) card.style.animation = `fadeIn 0.5s ease ${i * 0.05}s forwards`;
            });
        });
    });

    // Portfolio search
    const searchInput = document.querySelector('.search-box input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll('.portfolio-card').forEach(card => {
                const text = (card.querySelector('.portfolio-name')?.textContent + card.querySelector('.portfolio-desc')?.textContent || '').toLowerCase();
                card.parentElement.style.display = text.includes(term) ? 'block' : 'none';
            });
        });
    }

    // Gallery lightbox
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const img = this.querySelector('img');
            if (!img) return;
            const overlay = document.createElement('div');
            overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.9);z-index:9999;display:flex;align-items:center;justify-content:center;cursor:pointer;animation:fadeIn 0.3s ease';
            const full = document.createElement('img');
            full.src = img.src;
            full.style.cssText = 'max-width:90%;max-height:90vh;border-radius:12px;box-shadow:0 20px 60px rgba(0,0,0,0.5)';
            overlay.appendChild(full);
            overlay.addEventListener('click', () => overlay.remove());
            document.body.appendChild(overlay);
        });
    });

    // Testimonial nav
    const prevBtn = document.getElementById('prevTestimonial');
    const nextBtn = document.getElementById('nextTestimonial');
    const testCards = document.querySelectorAll('#testimonialCarousel > div');
    let currentIdx = 0;
    if (prevBtn && nextBtn && testCards.length) {
        [prevBtn, nextBtn].forEach(btn => {
            btn.addEventListener('click', function() {
                testCards[currentIdx].style.opacity = '0.3';
                currentIdx = (currentIdx + (this.id === 'nextTestimonial' ? 1 : -1) + testCards.length) % testCards.length;
                testCards[currentIdx].style.opacity = '1';
            });
        });
    }
</script>
@endpush
@endsection
