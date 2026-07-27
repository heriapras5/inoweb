@extends('layouts.frontend')

@section('title', 'Portofolio - INOWEB')

@section('meta_description', 'Lihat berbagai proyek website profesional yang telah kami rancang dan kembangkan untuk berbagai kebutuhan bisnis.')

@section('content')
<!-- Page Hero -->
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Projek</li>
            </ol>
        </nav>
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right" data-aos-delay="100">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">Portofolio <span class="text-gradient">Website</span> yang Telah Kami Buat</h1>
                <p class="text-[#8892b0] text-base sm:text-lg leading-relaxed mb-8">Berbagai solusi website profesional yang telah kami rancang untuk membantu bisnis, UMKM, dan perusahaan berkembang secara digital.</p>
                <div class="flex flex-wrap gap-3">
                    <span class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white/80 text-xs font-semibold px-4 py-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        Desain Modern
                    </span>
                    <span class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white/80 text-xs font-semibold px-4 py-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                        Responsive
                    </span>
                    <span class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white/80 text-xs font-semibold px-4 py-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        Performa Optimal
                    </span>
                </div>
            </div>
            <div class="hidden lg:block relative" data-aos="fade-left" data-aos-delay="300">
                @php $heroProject = $projects->first(); $heroImg = $heroProject?->coverImage()?->image; @endphp
                @if($heroImg)
                <div class="relative">
                    <img src="{{ asset($heroImg) }}" alt="{{ $heroProject->name }}" loading="lazy"
                         class="w-full rounded-2xl shadow-2xl border border-white/10 object-cover">
                </div>
                @else
                <div class="w-full aspect-video rounded-2xl bg-gradient-to-b from-[#0f2744] to-[#0a192f] flex items-center justify-center border border-white/10 shadow-2xl">
                    <div class="text-center p-8">
                        <div class="w-16 h-16 mx-auto bg-blue-600/20 rounded-2xl flex items-center justify-center text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        <div class="h-3 bg-white/10 rounded-full w-3/4 mx-auto mb-2"></div>
                        <div class="h-3 bg-white/10 rounded-full w-1/2 mx-auto mb-6"></div>
                        <div class="w-[120px] h-9 bg-blue-600/30 rounded-lg mx-auto"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Filter & Grid -->
<section class="pb-16 sm:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="filter-section flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <span class="text-[0.7rem] font-bold tracking-[0.2em] uppercase text-blue-600">PROJEK KAMI</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#1a1a2e] mt-1">Jelajahi Portofolio Website Kami</h2>
            </div>
            <div class="flex gap-2 overflow-x-auto flex-nowrap max-lg:pb-2 -mx-2 px-2 max-lg:w-full">
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
            <div x-data @click="window.location='{{ route('portfolio.detail', $project->slug) }}'" class="portfolio-card cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-category="{{ $project->category->slug }}">
                <div class="portfolio-img relative">
                    <img src="{{ $project->coverImage() ? asset($project->coverImage()->image) : '' }}" alt="{{ $project->name }}" loading="lazy">
                    <span class="portfolio-card-badge {{ $project->badge_class }}">{{ $project->category->name }}</span>
                </div>
                <div class="p-5">
                    <h5 class="text-sm font-bold text-[#1a1a2e] mb-1.5">{{ $project->name }}</h5>
                    <p class="text-xs text-[#64748b] line-clamp-2 leading-relaxed mb-3">{!! strip_tags($project->description) !!}</p>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('portfolio.detail', $project->slug) }}" @click.stop class="inline-flex items-center gap-1.5 text-blue-600 text-xs font-semibold no-underline hover:text-blue-700 transition-colors">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <a href="{{ $project->url ?: '#' }}" target="_blank" @click.stop class="inline-flex items-center gap-1.5 text-emerald-600 text-xs font-semibold no-underline hover:text-emerald-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            Demo
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
                <p class="text-white/70 text-base mt-2 max-w-xl">Kami siap membantu mewujudkan website profesional yang sesuai dengan kebutuhan bisnis Anda.</p>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-2">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}?text=Halo,%20saya%20tertarik%20dengan%20layanan%20INOWEB" target="_blank" class="inline-flex items-center justify-center bg-white text-blue-600 px-8 py-3.5 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5 hover:shadow-lg">
                    Konsultasi Gratis via WhatsApp
                </a>
                <span class="text-xs text-white/50">Gratis konsultasi &bull; Respon cepat &bull; Tanpa komitmen</span>
            </div>
        </div>
    </div>
</section>
@endsection