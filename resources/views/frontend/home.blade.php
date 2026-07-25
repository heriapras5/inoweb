@extends('layouts.frontend')

@section('content')
<!-- Hero -->
<section class="bg-gradient-hero min-h-screen relative overflow-hidden pt-20 flex items-center">
    <x-hero-bg />
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
                <div class="hidden lg:block relative py-10" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200"
                     x-data="{ active: 0, images: {{ json_encode($projects->pluck('images')->flatten(1)->pluck('image')->filter()->take(4)->values()) }}, interval: null }"
                     x-init="if (images.length > 1) { interval = setInterval(() => active = (active + 1) % images.length, 4000) }"
                     @mouseenter="if (images.length > 1) clearInterval(interval)"
                     @mouseleave="if (images.length > 1) interval = setInterval(() => active = (active + 1) % images.length, 4000)">
                    <div class="mockup-main overflow-hidden">
                        <div class="bg-[#1a1a2e] px-4 py-2.5 flex gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-yellow-500"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                        </div>
                        <div class="relative bg-gradient-to-b from-[#0f2744] to-[#0a192f]" style="min-height: 320px;">
                            <template x-if="images.length">
                                <template x-for="(img, i) in images" :key="i">
                                    <img :src="img" x-show="active === i" x-transition.opacity.duration.500
                                         class="w-full h-full object-cover absolute inset-0"
                                         style="min-height: 320px;">
                                </template>
                            </template>
                            <template x-if="!images.length">
                                <div class="p-8">
                                    <div class="h-3 bg-white/10 rounded-full w-3/4 mb-2"></div>
                                    <div class="h-3 bg-white/10 rounded-full w-1/2 mb-3"></div>
                                    <div class="w-[120px] h-9 bg-blue-600 rounded-lg mt-2.5"></div>
                                </div>
                            </template>
                            <template x-if="images.length > 1">
                                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5 z-10">
                                    <template x-for="(img, i) in images" :key="i">
                                        <button @click="active = i"
                                                :class="active === i ? 'bg-blue-500 w-5' : 'bg-white/40 w-2'"
                                                class="h-2 rounded-full transition-all duration-300"></button>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- Layanan -->
<section class="py-16 sm:py-24 bg-white" id="layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">LAYANAN KAMI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Layanan Lengkap untuk Kebutuhan <span class="text-blue-600">Website</span> Anda</h2>
            <p class="text-[#64748b] text-base leading-relaxed mt-3 max-w-2xl mx-auto">Kami menyediakan berbagai solusi website yang dirancang khusus sesuai kebutuhan bisnis Anda.</p>
        </div>
        <div class="grid sm:grid-cols-2 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="service-icon">{!! $service->icon !!}</div>
                <h5 class="text-lg font-bold text-[#1a1a2e] mb-2.5">{{ $service->title }}</h5>
                <p class="text-sm text-[#64748b] leading-relaxed mb-4">{{ $service->description }}</p>
                <a href="{{ route('services') }}" class="text-blue-600 font-semibold text-sm no-underline inline-flex items-center gap-1.5 hover:gap-2.5 transition-all">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('services') }}" class="btn-outline-dark px-6 py-3 text-base">Lihat Semua Layanan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
    </div>
</section>

<!-- Portfolio -->
<section class="py-16 sm:py-24 bg-gray-50" id="portofolio">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PORTOFOLIO KAMI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight">Beberapa Hasil Karya <span class="text-blue-600">Terbaik</span> Kami</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($projects as $index => $project)
            <div x-data @click="window.location='{{ route('portfolio.detail', $project->slug) }}'" class="portfolio-card cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="portfolio-img">
                    <img src="{{ $project->images->first()->image ?? '' }}" alt="{{ $project->name }}" loading="lazy">
                    <div class="absolute top-4 left-4"><span class="portfolio-badge {{ $project->badge_class }}">{{ $project->category->name }}</span></div>
                </div>
                <div class="p-5">
                    <h5 class="text-base font-bold text-[#1a1a2e] mb-2">{{ $project->name }}</h5>
                    <p class="text-sm text-[#64748b] line-clamp-2 mb-3">{{ $project->description }}</p>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('portfolio.detail', $project->slug) }}" @click.stop
                           class="inline-flex items-center gap-1 bg-blue-600 text-white text-xs px-3 py-1.5 rounded-full no-underline hover:bg-blue-700 transition-all">
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
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3 text-base">Lihat Semua Portofolio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
    </div>
</section>

<!-- Proses Kerja -->
<section class="py-16 sm:py-24 bg-white" id="proses">
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
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6">
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

<!-- CTA -->
<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center" data-aos="zoom-in">
            <div data-aos="fade-right" data-aos-delay="200">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Siap Membangun Website Profesional untuk Bisnis Anda?</h2>
                <p class="text-white/70 text-base leading-relaxed">Konsultasikan kebutuhan Anda sekarang juga dan dapatkan solusi terbaik dari tim profesional INOWEB.</p>
            </div>
            <div class="sm:text-right" data-aos="fade-left" data-aos-delay="400">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20INOWEB" target="_blank" class="flex sm:inline-flex items-center justify-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-green-600 transition-all hover:-translate-y-0.5 hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="20" height="20">
                        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>


@endsection
