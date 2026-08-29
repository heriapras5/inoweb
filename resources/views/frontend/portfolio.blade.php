@extends('layouts.frontend')

@section('title', 'Portofolio - INOWEB')

@section('meta_description', 'Lihat berbagai portofolio website profesional yang telah kami rancang dan kembangkan untuk berbagai kebutuhan bisnis.')

@section('content')
<!-- Page Hero -->
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Beranda</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li class="text-blue-600 font-medium">Portofolio</li>
            </ol>
        </nav>
        <div data-aos="fade-up">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0f172a] leading-tight mb-4">Portofolio <span class="text-gradient">Website</span></h1>
            <p class="text-[#64748b] text-base sm:text-lg leading-relaxed max-w-2xl">Berbagai solusi website profesional yang telah kami rancang untuk membantu bisnis, UMKM, dan perusahaan berkembang secara digital.</p>
        </div>
    </div>
</section>

<!-- Filter & Grid -->
<section class="pb-16 sm:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="filter-section flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <span class="text-[0.7rem] font-bold tracking-[0.2em] uppercase text-blue-600">PORTOFOLIO KAMI</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#1a1a2e] mt-1">Jelajahi Portofolio Website Kami</h2>
            </div>
            <div class="flex gap-2 overflow-x-auto flex-nowrap max-lg:pb-2 -mx-2 px-2 max-lg:w-full scrollbar-hide">
                <button class="filter-tab active shrink-0" data-filter="all">Semua</button>
                <button class="filter-tab shrink-0" data-filter="company">Company Profile</button>
                <button class="filter-tab shrink-0" data-filter="catalog">Katalog Produk</button>
                <button class="filter-tab shrink-0" data-filter="umkm">UMKM</button>
                <button class="filter-tab shrink-0" data-filter="sistem">Sistem</button>
                <button class="filter-tab shrink-0" data-filter="landing">Landing Page</button>
                <button class="filter-tab shrink-0" data-filter="custom">Custom</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-12">
            @foreach($projects as $index => $project)
            <a href="{{ route('portfolio.detail', $project->slug) }}" class="portfolio-card block cursor-pointer no-underline" data-aos="fade-up" data-aos-delay="{{ $index * 30 }}" data-category="{{ $project->categories->pluck('slug')->implode(' ') }}">
                <div class="portfolio-img relative">
                    <img src="{{ $project->coverImage() ? asset($project->coverImage()->image) : '' }}" alt="{{ $project->name }}" loading="lazy" decoding="async">
                    <span class="portfolio-card-badge {{ $project->badge_class }}">{{ $project->categories->first()?->name }}</span>
                </div>
                <div class="p-5">
                    <h5 class="text-sm font-bold text-[#1a1a2e] mb-1.5">{{ $project->name }}</h5>
                    <p class="text-xs text-[#64748b] line-clamp-2 leading-relaxed mb-3">{!! strip_tags($project->description) !!}</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 text-blue-600 text-xs font-semibold">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $projects->links() }}
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12" data-aos="fade-up">
            <div class="cta-icon shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">Punya kebutuhan website seperti ini?</h2>
                <p class="text-white/80 text-base mt-2 max-w-xl">Kami siap membantu mewujudkan website profesional yang sesuai dengan kebutuhan bisnis Anda.</p>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-2">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20tertarik%20dengan%20layanan%20INOWEB" target="_blank" rel="noopener" class="inline-flex items-center justify-center bg-white text-blue-600 px-8 py-3.5 rounded-full font-semibold text-base no-underline hover:bg-blue-50 transition-all hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
                    Konsultasi Gratis via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection