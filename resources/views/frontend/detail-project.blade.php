@extends('layouts.frontend')

@section('title', $project->name . ' - INOWEB')
@section('meta_description', $project->description ? strip_tags($project->description) : 'Detail portofolio website ' . $project->name)

@section('content')
@php $firstImage = $project->coverImage(); @endphp

{{-- Page Header --}}
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Beranda</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li><a href="{{ route('portfolio') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Portofolio</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li class="text-blue-600 font-medium truncate max-w-[200px]">{{ $project->name }}</li>
            </ol>
        </nav>
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right" data-aos-delay="100">
                @if($project->categories->isNotEmpty())
                <span class="inline-block text-[0.7rem] font-bold tracking-[0.2em] uppercase text-blue-600 mb-3">{{ $project->categories->first()->name }}</span>
                @endif
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0f172a] leading-tight mb-6">
                    @php
                        $words = explode(' ', $project->name);
                        $mid = max(1, floor(count($words) / 2));
                        $first = implode(' ', array_slice($words, 0, $mid));
                        $last = implode(' ', array_slice($words, $mid));
                    @endphp
                    {{ $first }} <span class="text-gradient">{{ $last }}</span>
                </h1>
                <div class="flex flex-wrap gap-3">
                    <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20tertarik%20dengan%20portofolio%20{{ urlencode($project->name) }}" target="_blank" rel="noopener" class="btn-primary px-6 py-3 text-base inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                    @if($project->url)
                    <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn-outline-dark px-6 py-3 text-base inline-flex items-center gap-2">
                        Lihat Website
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="150">
                @if($firstImage)
                <div class="relative">
                    <img src="{{ asset($firstImage->image) }}" alt="{{ $project->name }}" loading="lazy" decoding="async"
                         class="w-full rounded-2xl shadow-lg border border-gray-200 object-cover">
                </div>
                @else
                <div class="w-full aspect-video rounded-2xl bg-gradient-to-b from-blue-50 to-slate-100 flex items-center justify-center border border-gray-100 shadow-2xl">
                    <div class="text-center p-8">
                        <div class="w-16 h-16 mx-auto bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        <div class="h-3 bg-slate-200 rounded-full w-3/4 mx-auto mb-2"></div>
                        <div class="h-3 bg-slate-200 rounded-full w-1/2 mx-auto mb-6"></div>
                        <div class="w-[120px] h-9 bg-blue-600 rounded-lg mx-auto"></div>
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
            @if($project->categories->isNotEmpty())
            <div class="inline-flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#94a3b8] font-semibold uppercase tracking-wider leading-tight">Jenis</p>
                    <p class="text-sm font-bold text-[#1e293b] leading-tight">{{ $project->categories->pluck('name')->implode(', ') }}</p>
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
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up">
            <span class="section-badge">DETAIL PORTOFOLIO</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] leading-tight">Deskripsi <span class="text-gradient">Portofolio</span></h2>
            <div class="section-accent"></div>
            <div class="prose-content bg-gray-50/60 rounded-2xl p-6 sm:p-8 border border-gray-100">
                {!! cleanRichText($project->description) !!}
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
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] leading-tight mt-2">Fitur <span class="text-gradient">{{ $project->name }}</span></h2>
            <div class="section-accent mx-auto"></div>
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
    $_galleryImages = $project->images->where('type', 'gallery')->values();
    $_cover = $project->coverImage();
    if ($_cover && $_cover->type === 'gallery' && $_galleryImages->count() > 1) {
        $_galleryImages = $_galleryImages->reject(fn($img) => $img->id === $_cover->id)->values();
    }
    if ($_galleryImages->isEmpty()) {
        $_galleryImages = $project->images;
    }
@endphp
@if($_galleryImages->count() > 0)
<section class="py-16 sm:py-20 {{ $project->features->count() ? 'bg-white' : 'bg-gray-50' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center" data-aos="fade-up">
            <span class="section-badge inline-block">GALERI</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] leading-tight mt-2">Tampilan <span class="text-gradient">{{ $project->name }}</span></h2>
            <div class="section-accent mx-auto"></div>
        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                @foreach($_galleryImages as $i => $img)
                <a href="{{ asset($img->image) }}" data-fancybox="gallery-{{ $project->id }}"
                   data-caption="{{ $img->caption ?? 'Tampilan ' . $project->name }}"
                   class="group relative block aspect-[4/3] overflow-hidden rounded-2xl border border-gray-200/70 shadow-sm ring-1 ring-black/5 transition-all duration-300 hover:shadow-xl hover:ring-blue-200/60">
                    <img src="{{ asset($img->image) }}" alt="{{ $img->caption ?? 'Screenshot ' . $project->name }}" loading="lazy" decoding="async"
                         class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-slate-900/10 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 transition-all duration-300 group-hover:opacity-100">
                        <span class="grid h-12 w-12 scale-75 place-items-center rounded-full bg-white/90 text-slate-900 shadow-lg transition-transform duration-300 group-hover:scale-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                        </span>
                    </div>
                    <span class="absolute left-3 top-3 rounded-full bg-white/85 px-2.5 py-1 text-[11px] font-bold text-slate-800 shadow-sm backdrop-blur">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    @if($img->caption)
                    <figcaption class="absolute inset-x-0 bottom-0 translate-y-2 p-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                        <span class="block truncate text-sm font-semibold text-white drop-shadow">{{ $img->caption }}</span>
                    </figcaption>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- Pagination --}}
@php
    $pagItems = $pagination['items'];
    $pagIndex = $pagination['currentIndex'];
    $pagTotal = $pagination['total'];
    $pagPrev = $pagIndex > 0 ? $pagItems[$pagIndex - 1] : null;
    $pagNext = $pagIndex < $pagTotal - 1 ? $pagItems[$pagIndex + 1] : null;
    $window = 2;
    $startPage = max(0, $pagIndex - $window);
    $endPage = min($pagTotal - 1, $pagIndex + $window);
    if ($startPage > 0) $startPage = max(0, $endPage - $window * 2);
    if ($endPage < $pagTotal - 1) $endPage = min($pagTotal - 1, $startPage + $window * 2);
@endphp
<section class="py-10 sm:py-14 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up">
            <p class="text-center text-sm text-[#94a3b8] mb-4">Portofolio {{ $pagIndex + 1 }} dari {{ $pagTotal }}</p>
            <div class="flex items-center justify-center gap-2">
                @if($pagPrev)
                <a href="{{ route('portfolio.detail', $pagPrev->slug) }}" class="pagination-link" aria-label="Sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </a>
                @else
                <span class="pagination-link opacity-30 cursor-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </span>
                @endif

                @if($startPage > 0)
                <a href="{{ route('portfolio.detail', $pagItems[0]->slug) }}" class="pagination-link">1</a>
                @if($startPage > 1)
                <span class="text-[#94a3b8] text-sm px-1">...</span>
                @endif
                @endif

                @for($i = $startPage; $i <= $endPage; $i++)
                @php $item = $pagItems[$i]; @endphp
                <a href="{{ route('portfolio.detail', $item->slug) }}"
                   class="pagination-link {{ $i === $pagIndex ? 'active' : '' }}">{{ $i + 1 }}</a>
                @endfor

                @if($endPage < $pagTotal - 1)
                @if($endPage < $pagTotal - 2)
                <span class="text-[#94a3b8] text-sm px-1">...</span>
                @endif
                <a href="{{ route('portfolio.detail', $pagItems[$pagTotal - 1]->slug) }}" class="pagination-link">{{ $pagTotal }}</a>
                @endif

                @if($pagNext)
                <a href="{{ route('portfolio.detail', $pagNext->slug) }}" class="pagination-link" aria-label="Selanjutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
                @else
                <span class="pagination-link opacity-30 cursor-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 sm:py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-blue rounded-2xl p-8 sm:p-10 lg:p-14 flex flex-col lg:flex-row items-center gap-8 lg:gap-12 relative overflow-hidden" data-aos="fade-up">
            <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center text-white shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Punya kebutuhan website seperti ini?</h3>
                <p class="text-white/80 mt-2 max-w-xl">Kami siap membantu mewujudkan website profesional yang sesuai dengan kebutuhan bisnis Anda.</p>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-2">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20tertarik%20dengan%20pembuatan%20website" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-3.5 rounded-full text-base font-semibold hover:bg-blue-50 hover:-translate-y-0.5 transition-all shadow-lg hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>
@endsection