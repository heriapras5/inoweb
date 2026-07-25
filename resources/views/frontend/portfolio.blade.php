@extends('layouts.frontend')

@section('title', 'Portofolio - INOWEB')

@section('meta_description', 'Lihat berbagai proyek website profesional yang telah kami rancang dan kembangkan untuk berbagai kebutuhan bisnis.')

@section('content')
<!-- Page Hero -->
<section class="bg-gradient-hero pt-36 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Portofolio</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Semua <span class="text-gradient">Proyek</span></h1>
        <p class="text-[#8892b0] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Berbagai proyek website profesional yang telah kami rancang dan kembangkan untuk berbagai kebutuhan bisnis.</p>
    </div>
</section>

<!-- Filter & Grid -->
<section class="pb-16 sm:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="filter-section flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4" data-aos="fade-up">
            <div class="flex gap-2 overflow-x-auto flex-nowrap max-lg:pb-2 -mx-2 px-2 max-lg:w-full">
                <button class="filter-tab active shrink-0" data-filter="all">Semua</button>
                <button class="filter-tab shrink-0" data-filter="company">Company Profile</button>
                <button class="filter-tab shrink-0" data-filter="catalog">Katalog Produk</button>
                <button class="filter-tab shrink-0" data-filter="umkm">Website UMKM</button>
                <button class="filter-tab shrink-0" data-filter="sistem">Sistem Management</button>
                <button class="filter-tab shrink-0" data-filter="landing">Landing Page</button>
                <button class="filter-tab shrink-0" data-filter="custom">Custom Website</button>
            </div>
            <div class="relative w-full lg:w-auto min-w-[200px] max-w-[280px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-4 top-1/2 -translate-y-1/2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" placeholder="Cari proyek..." class="w-full pl-10 pr-4 py-2.5 border border-[#e2e8f0] rounded-full text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all">
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
            @foreach($projects as $index => $project)
            <div x-data @click="window.location='{{ route('portfolio.detail', $project->slug) }}'" class="portfolio-card cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-category="{{ $project->category->slug }}">
                <div class="portfolio-img">
                    <img src="{{ $project->images->first()->image ?? '' }}" alt="{{ $project->name }}" loading="lazy">
                    <div class="absolute top-4 left-4"><span class="portfolio-badge {{ $project->badge_class }}">{{ $project->category->name }}</span></div>
                </div>
                <div class="p-5">
                    <h5 class="portfolio-name text-base font-bold text-[#1a1a2e] mb-1">{{ $project->name }}</h5>
                    <p class="portfolio-desc text-sm text-[#64748b] mb-3">{{ $project->description }}</p>
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

        <!-- Pagination -->
        <div class="flex justify-center mt-12" data-aos="fade-up">
            <nav class="flex items-center gap-2" aria-label="Pagination">
                <a href="#" class="pagination-link" aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </a>
                <a href="#" class="pagination-link active">1</a>
                <a href="#" class="pagination-link">2</a>
                <a href="#" class="pagination-link">3</a>
                <a href="#" class="pagination-link">4</a>
                <a href="#" class="pagination-link">5</a>
                <a href="#" class="pagination-link" aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </nav>
        </div>
    </div>
</section>
@endsection
