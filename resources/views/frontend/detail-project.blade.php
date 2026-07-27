@extends('layouts.frontend')

@section('title', $project->name . ' - INOWEB')
@section('meta_description', $project->description ? strip_tags($project->description) : 'Detail proyek website ' . $project->name)

@section('content')
@php $firstImage = $project->coverImage(); @endphp

{{-- Page Header --}}
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li><a href="{{ route('portfolio') }}" class="text-white/60 no-underline hover:text-white transition-colors">Projek</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium truncate max-w-[200px]">{{ $project->name }}</li>
            </ol>
        </nav>
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right" data-aos-delay="100">
                @if($project->category)
                <span class="inline-block text-[0.7rem] font-bold tracking-[0.2em] uppercase text-blue-400 mb-3">{{ $project->category->name }}</span>
                @endif
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                    @php
                        $words = explode(' ', $project->name);
                        $mid = max(1, floor(count($words) / 2));
                        $first = implode(' ', array_slice($words, 0, $mid));
                        $last = implode(' ', array_slice($words, $mid));
                    @endphp
                    {{ $first }} <span class="text-gradient">{{ $last }}</span>
                </h1>
                <div class="flex flex-wrap gap-3">
                    <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}?text=Halo,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($project->name) }}" target="_blank" class="btn-primary px-6 py-3 text-base inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                    @if($project->url)
                    <a href="{{ $project->url }}" target="_blank" class="btn-outline-light px-6 py-3 text-base inline-flex items-center gap-2">
                        Lihat Website
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="300">
                @if($firstImage)
                <div class="relative">
                    <img src="{{ asset($firstImage->image) }}" alt="{{ $project->name }}" loading="lazy"
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

{{-- Info Badge Row --}}
<section class="border-b border-gray-100 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3 py-6">
            @if($project->category)
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">Jenis</p>
                    <p class="text-sm font-bold text-[#1e293b] leading-tight">{{ $project->category->name }}</p>
                </div>
            </div>
            @endif
            @if($project->client)
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">Klien</p>
                    <p class="text-sm font-bold text-[#1e293b] leading-tight">{{ $project->client }}</p>
                </div>
            </div>
            @endif
            @if($project->year)
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">Tahun</p>
                    <p class="text-sm font-bold text-[#1e293b] leading-tight">{{ $project->year }}</p>
                </div>
            </div>
            @endif
            @if($project->technologies->count())
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">Teknologi</p>
                    <div class="flex flex-wrap gap-1">
                        @foreach($project->technologies as $tech)
                        <span class="text-[11px] font-semibold text-[#475569]">{{ $tech->name }}@if(!$loop->last), @endif</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($project->url)
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-cyan-100 rounded-lg flex items-center justify-center text-cyan-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">URL</p>
                    <p class="text-sm font-bold text-blue-600 leading-tight truncate max-w-[180px]">{{ $project->url }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- Deskripsi Lengkap --}}
@if($project->description)
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up">
            <span class="section-badge">DETAIL PROJEK</span>
            <div class="w-12 h-1 bg-blue-600 mt-3 mb-8 rounded-full"></div>
            <div class="prose-content">
                {!! $project->description !!}
            </div>
        </div>
    </div>
</section>
@endif

{{-- Features --}}
@if($project->features->count())
<section class="py-16 sm:py-20 {{ $project->description ? 'bg-gray-50' : 'bg-white' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center" data-aos="fade-up">
            <span class="section-badge inline-block">FITUR UTAMA</span>
            <div class="w-12 h-1 bg-blue-600 mx-auto mt-3 rounded-full"></div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mt-4">Fitur {{ $project->name }}</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">
            @foreach($project->features as $feature)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                    @if($feature->icon)
                        {!! $feature->icon !!}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    @endif
                </div>
                <h4 class="text-base font-bold text-[#1a1a2e] mb-2">{{ $feature->feature }}</h4>
                @if($feature->description)
                <p class="text-sm text-[#64748b] leading-relaxed">{{ $feature->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Galeri --}}
@php
    $_galleryImages = $project->images->where('type', 'gallery');
    $_cover = $project->coverImage();
    if ($_cover && $_cover->type === 'gallery') {
        $_galleryImages = $_galleryImages->reject(fn($img) => $img->id === $_cover->id);
    }
@endphp
@if($_galleryImages->count() > 0)
<section class="py-16 sm:py-20 {{ $project->features->count() ? 'bg-white' : 'bg-gray-50' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center" data-aos="fade-up">
            <span class="section-badge inline-block">GALERI</span>
            <div class="w-12 h-1 bg-blue-600 mx-auto mt-3 rounded-full"></div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mt-4">Tampilan {{ $project->name }}</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-6" data-aos="fade-up" data-aos-delay="100">
            @foreach($_galleryImages as $i => $img)
            <a href="{{ asset($img->image) }}" data-fancybox="gallery-{{ $project->id }}"
               data-caption="{{ $img->caption ?? 'Tampilan ' . $project->name }}"
               class="group rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-white block relative">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset($img->image) }}" alt="{{ $img->caption ?? 'Screenshot ' . $project->name }}" loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300 flex items-center justify-center">
                    <svg class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 scale-0 group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                </div>
                @if($img->caption)
                <div class="px-4 py-3 bg-white relative z-10">
                    <p class="text-sm text-[#475569] font-medium">{{ $img->caption }}</p>
                </div>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Pagination --}}
<section class="py-10 sm:py-14 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4" data-aos="fade-up">
            @if($prevProject)
            <a href="{{ route('portfolio.detail', $prevProject->slug) }}" class="group flex items-center gap-3 text-left no-underline max-w-[45%]">
                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#64748b] group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </div>
                <div class="min-w-0">
                    <span class="text-[11px] text-[#94a3b8] font-semibold uppercase tracking-wider">Sebelumnya</span>
                    <p class="text-sm font-bold text-[#1e293b] truncate group-hover:text-blue-600 transition-colors">{{ $prevProject->name }}</p>
                </div>
            </a>
            @else
            <div></div>
            @endif
            @if($nextProject)
            <a href="{{ route('portfolio.detail', $nextProject->slug) }}" class="group flex items-center gap-3 text-right no-underline max-w-[45%]">
                <div class="min-w-0">
                    <span class="text-[11px] text-[#94a3b8] font-semibold uppercase tracking-wider">Selanjutnya</span>
                    <p class="text-sm font-bold text-[#1e293b] truncate group-hover:text-blue-600 transition-colors">{{ $nextProject->name }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#64748b] group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>
            @else
            <div></div>
            @endif
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 sm:py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-blue rounded-2xl p-8 sm:p-10 lg:p-14 flex flex-col lg:flex-row items-center gap-8 lg:gap-12 relative overflow-hidden" data-aos="fade-up">
            <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-white shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Punya kebutuhan website seperti ini?</h3>
                <p class="text-white/70 mt-2 max-w-xl">Kami siap membantu mewujudkan website profesional yang sesuai dengan kebutuhan bisnis Anda.</p>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-2">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}?text=Halo,%20saya%20tertarik%20dengan%20pembuatan%20website" target="_blank" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-3.5 rounded-full text-base font-semibold hover:bg-gray-100 hover:-translate-y-0.5 transition-all shadow-lg hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    Konsultasi Gratis
                </a>
                <span class="text-xs text-white/50">Gratis konsultasi &bull; Respon cepat &bull; Tanpa komitmen</span>
            </div>
        </div>
    </div>
</section>
@endsection