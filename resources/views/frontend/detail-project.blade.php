@extends('layouts.frontend')

@section('title', $project->name . ' - INOWEB')
@section('meta_description', $project->description ?? 'Detail proyek website ' . $project->name)

@section('content')
<!-- Detail Hero -->
<section class="bg-gradient-hero pt-32 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li><a href="{{ route('portfolio') }}" class="text-white/60 no-underline hover:text-white transition-colors">Portofolio</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">{{ $project->name }}</li>
            </ol>
        </nav>
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-delay="100">
                <span class="portfolio-badge {{ $project->badge_class }} inline-block mb-4">{{ $project->category->name }}</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight mb-4">{{ $project->name }}</h1>
                <p class="text-[#8892b0] text-base sm:text-lg leading-relaxed mb-8">{{ $project->description }}</p>
                <div class="flex flex-wrap gap-6 mb-8">
                    <div class="flex items-center gap-2.5">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div><div class="text-[0.75rem] text-[#8892b0] uppercase tracking-wider">Klien</div><div class="text-sm text-white font-semibold">{{ $project->client }}</div></div>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <div><div class="text-[0.75rem] text-[#8892b0] uppercase tracking-wider">Kategori</div><div class="text-sm text-white font-semibold">{{ $project->category->name }}</div></div>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <div><div class="text-[0.75rem] text-[#8892b0] uppercase tracking-wider">Tahun</div><div class="text-sm text-white font-semibold">{{ $project->year }}</div></div>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div><div class="text-[0.75rem] text-[#8892b0] uppercase tracking-wider">Durasi</div><div class="text-sm text-white font-semibold">{{ $project->duration }}</div></div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn-primary px-6 py-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        Pesan via WhatsApp
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn-outline-light px-6 py-3 text-base">Lihat Semua Proyek <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
                </div>
            </div>
            <div class="hidden lg:block relative" data-aos="fade-left" data-aos-delay="300">
                <div class="mockup-laptop">
                    <div class="bg-[#1a1a2e] px-4 py-2.5 flex gap-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-500"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                    </div>
                    <div class="p-8 bg-gradient-to-b from-[#0f2744] to-[#0a192f]">
                        <div class="h-3 bg-white/10 rounded-full w-3/4 mb-2"></div>
                        <div class="h-3 bg-white/10 rounded-full w-1/2 mb-3"></div>
                        <div class="w-[120px] h-9 bg-blue-600 rounded-lg mb-4"></div>
                        <div class="space-y-2">
                            <div class="h-2.5 bg-white/10 rounded-full w-full"></div>
                            <div class="h-2.5 bg-white/10 rounded-full w-3/4"></div>
                            <div class="h-2.5 bg-white/10 rounded-full w-full"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute -right-5 -bottom-10 w-[140px] bg-[#112240] rounded-[20px] border-2 border-blue-600/30 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.4)]">
                    <div class="bg-[#1a1a2e] px-3 py-1.5 flex gap-1">
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    </div>
                    <div class="p-5 bg-gradient-to-b from-[#0f2744] to-[#0a192f] min-h-[200px]">
                        <div class="h-2 bg-white/10 rounded-full w-3/4 mb-2"></div>
                        <div class="h-2 bg-white/10 rounded-full w-1/2 mb-3"></div>
                        <div class="w-20 h-7 bg-blue-600 rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Proyek -->
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12">
            <div class="lg:col-span-7" data-aos="fade-right">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Tentang Proyek</h3>
                @if($project->about)
                    @foreach($project->about as $paragraph)
                    <p class="text-[#475569] leading-relaxed text-base {{ !$loop->first ? 'mt-3' : '' }}">{{ $paragraph }}</p>
                    @endforeach
                @endif
                @if($project->stats)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-6">
                    @foreach($project->stats as $stat)
                    <div class="project-stat-card">
                        <div class="text-2xl sm:text-3xl font-extrabold text-blue-600 mb-1">{{ $stat['number'] }}</div>
                        <div class="text-sm text-[#64748b] font-medium">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="lg:col-span-5" data-aos="fade-left">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Fitur Utama</h3>
                <ul class="feature-list">
                    @foreach($project->features as $feature)
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ $feature->feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Teknologi & Galeri -->
<section class="py-16 sm:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12">
            <div class="lg:col-span-5" data-aos="fade-right">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Teknologi yang Digunakan</h3>
                <div class="grid grid-cols-3 gap-3 mt-2">
                    @foreach($project->technologies as $tech)
                    <div class="tech-item">
                        <div class="tech-icon-box">{!! $tech->icon !!}</div>
                        <span class="text-sm font-semibold text-[#1a1a2e]">{{ $tech->name }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="lg:col-span-7" data-aos="fade-left">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Galeri Tampilan</h3>
                <div class="grid grid-cols-2 gap-3 mt-2">
                    @foreach($project->images as $image)
                    <div class="gallery-item">
                        <img src="{{ $image->image }}" alt="Tampilan" loading="lazy">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hasil & Testimoni -->
<section class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12">
            <div class="lg:col-span-7" data-aos="fade-right">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Hasil yang Dicapai</h3>
                <p class="text-[#475569] leading-relaxed text-base">{{ $project->result_text }}</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                    @foreach($project->results as $result)
                    <div class="text-center p-5">
                        <div class="result-stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $result->icon !!}</svg>
                        </div>
                        <div class="result-stat-number">{{ $result->number }}</div>
                        <div class="text-sm text-[#64748b]">{{ $result->label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="lg:col-span-5" data-aos="fade-left">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1a1a2e] mb-5">Testimoni Klien</h3>
                @php $testimonial = $project->testimonial->first(); @endphp
                @if($testimonial)
                <div class="bg-gray-50 border border-[#e2e8f0] rounded-2xl p-10">
                    <p class="text-[#475569] leading-relaxed text-base italic mb-6">"{{ $testimonial->quote }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="author-avatar"><img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}"></div>
                        <div><h6 class="text-sm font-bold text-[#1a1a2e] mb-0">{{ $testimonial->name }}</h6><small class="text-[#64748b] text-xs">{{ $testimonial->role }}</small></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="py-16 sm:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PROYEK TERKAIT</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e]">Proyek <span class="text-blue-600">Lainnya</span></h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedProjects as $related)
            <div x-data @click="window.location='{{ route('portfolio.detail', $related->slug) }}'" class="portfolio-card cursor-pointer" data-aos="fade-up">
                <div class="portfolio-img">
                    <img src="{{ $related->images->first()->image ?? '' }}" alt="{{ $related->name }}" loading="lazy">
                    <div class="absolute top-4 left-4"><span class="portfolio-badge {{ $related->badge_class }}">{{ $related->category->name }}</span></div>
                </div>
                <div class="p-5">
                    <h5 class="text-base font-bold text-[#1a1a2e] mb-3">{{ $related->name }}</h5>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('portfolio.detail', $related->slug) }}" @click.stop
                           class="inline-flex items-center gap-1 border border-blue-600 text-blue-600 text-xs px-3 py-1.5 rounded-full no-underline hover:bg-blue-600 hover:text-white transition-all">
                            Detail
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($related->name) }}" target="_blank" @click.stop
                           class="inline-flex items-center gap-1 bg-green-500 text-white text-xs px-3 py-1.5 rounded-full no-underline hover:bg-green-600 transition-all">
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Bottom -->
<section class="py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-blue rounded-2xl p-6 sm:p-10 lg:p-12 flex flex-col lg:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <h3 class="text-xl sm:text-2xl font-bold text-white">Punya proyek serupa?</h3>
                <p class="text-white/70 mt-2">Kami siap membantu mewujudkan website profesional yang sesuai dengan kebutuhan bisnis Anda.</p>
            </div>
            <div class="flex flex-wrap gap-3 shrink-0">
                <a href="https://wa.me/6281234567890" target="_blank" class="btn-primary bg-white text-blue-600 px-6 py-3 text-base hover:bg-gray-100 hover:text-blue-700 hover:shadow-lg">Pesan via WhatsApp <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
                <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3 text-base border-white/30 text-white hover:bg-white/10 hover:border-white hover:text-white">Lihat Semua Proyek <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
        </div>
    </div>
</section>


@endsection
