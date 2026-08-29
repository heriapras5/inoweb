@extends('layouts.frontend')

@section('content')
<!-- Hero -->
<section class="relative overflow-hidden pt-24 sm:pt-32 pb-16 sm:pb-20 lg:min-h-screen lg:flex lg:items-center" style="background: linear-gradient(180deg, #eff6ff 0%, #f8fafc 50%, #ffffff 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative w-full">
        @php $waNum = setting('whatsapp_number', '6285736186308'); @endphp
        <div class="grid lg:grid-cols-2 gap-12 items-center"
             x-data="{
                 active: 0,
                 slides: {{ $heroSections->map(fn($s) => ['title' => $s->title, 'description' => $s->description, 'image' => $s->image ? asset($s->image) : null, 'button_text' => $s->button_text, 'button_url' => $s->button_url])->toJson() }},
                 interval: null,
                 next() { if (this.slides.length > 1) this.active = (this.active + 1) % this.slides.length },
                 prev() { if (this.slides.length > 1) this.active = (this.active - 1 + this.slides.length) % this.slides.length },
                 init() { if (this.slides.length > 1) this.interval = setInterval(() => this.next(), 4000) }
             }"
             @mouseenter="if (slides.length > 1) clearInterval(interval)"
             @mouseleave="if (slides.length > 1) interval = setInterval(() => next(), 4000)"
             @focusin="if (slides.length > 1) clearInterval(interval)"
             @focusout="if (slides.length > 1) interval = setInterval(() => next(), 4000)"
             role="region" aria-roledescription="carousel" aria-label="Promo utama INOWEB">

            <!-- Left: Text content -->
            <div data-aos="fade-right">
                <template x-if="slides.length">
                    <template x-for="(slide, i) in slides" :key="i">
                        <div x-show="active === i" x-transition.opacity.duration.300>
                            <div class="hero-badge mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                INOVASI &bull; PROFESIONAL &bull; TERPERCAYA
                            </div>
                            <h1 class="text-4xl sm:text-5xl lg:text-[3.2rem] font-extrabold text-[#0f172a] leading-tight mb-5" x-text="slide.title"></h1>
                            <p class="text-[#475569] text-base sm:text-lg leading-relaxed mb-8 max-w-lg" x-text="slide.description"></p>
                            <div class="flex flex-col sm:flex-row gap-3 mb-8">
                                <a :href="slide.button_url || 'https://wa.me/{{ $waNum }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20pembuatan%20website'" target="_blank" rel="noopener" class="btn-primary px-6 py-3 text-base inline-flex items-center justify-center gap-2">
                                    <span x-text="slide.button_text || 'Konsultasi Gratis'"></span>
                                </a>
                                <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3 text-base inline-flex items-center justify-center gap-2">
                                    Lihat Portofolio
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                </a>
                            </div>
                        </div>
                    </template>
                </template>
                <template x-if="!slides.length">
                    <div>
                        <div class="hero-badge mb-4">INOVASI &bull; PROFESIONAL &bull; TERPERCAYA</div>
                        <h2 class="text-4xl sm:text-5xl lg:text-[3.2rem] font-extrabold text-[#0f172a] leading-tight mb-5">Solusi Website Profesional<br>Untuk Bisnis Anda</h2>
                        <p class="text-[#475569] text-base sm:text-lg leading-relaxed mb-8 max-w-lg">INOWEB hadir untuk membantu bisnis, UMKM, dan perusahaan memiliki website modern, cepat, dan sesuai kebutuhan Anda.</p>
                        <div class="flex flex-col sm:flex-row gap-3 mb-8">
                            <a href="https://wa.me/{{ $waNum }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20pembuatan%20website" target="_blank" rel="noopener" class="btn-primary px-6 py-3 text-base inline-flex items-center justify-center gap-2">
                                Konsultasi Gratis
                            </a>
                            <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3 text-base inline-flex items-center justify-center gap-2">
                                Lihat Portofolio
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>
                </template>

                <!-- Feature badges -->
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <div class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                        <span class="text-[#475569] text-xs sm:text-sm">Desain Modern &amp; Elegan</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        <span class="text-[#475569] text-xs sm:text-sm">Responsif di Semua Perangkat</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <span class="text-[#475569] text-xs sm:text-sm">SEO Friendly &amp; Cepat di Google</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <span class="text-[#475569] text-xs sm:text-sm">Garansi &amp; Dukungan Penuh</span>
                    </div>
                </div>
            </div>

            <!-- Right: Hero 3D (auto-slide project cover images) -->
            @php
                $heroProjects = $projects->filter(fn($p) => $p->coverImage())->values()->map(fn($p) => [
                    'image' => asset($p->coverImage()->image),
                    'title' => $p->name,
                    'slug' => $p->slug,
                ])->all();
            @endphp
            <div class="block lg:block relative py-10 lg:py-10" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-3d relative"
                     x-data="{
                         items: @json($heroProjects),
                         active: 0,
                         timer: null,
                         init() { if (this.items.length > 1) this.timer = setInterval(() => this.next(), 4500); },
                         next() { if (this.items.length) this.active = (this.active + 1) % this.items.length; },
                         prev() { if (this.items.length) this.active = (this.active - 1 + this.items.length) % this.items.length; }
                     }"
                     @mouseenter="clearInterval(timer)"
                     @mouseleave="if (items.length > 1) timer = setInterval(() => next(), 4500)"
                     @touchstart="clearInterval(timer)"
                     @touchend="if (items.length > 1) timer = setInterval(() => next(), 4500)">

                    <div class="hero-3d-glow" data-parallax data-parallax-speed="0.25" style="width:300px;height:300px;background:rgba(37,99,235,0.16);top:-60px;left:-30px;"></div>
                    <div class="hero-3d-glow" data-parallax data-parallax-speed="-0.2" style="width:260px;height:260px;background:rgba(96,165,250,0.18);bottom:-50px;right:-40px;"></div>
                    <div class="hero-3d-glow" data-parallax data-parallax-speed="0.1" style="width:180px;height:180px;background:rgba(37,99,235,0.12);top:30%;left:-70px;"></div>

                    <div class="hero-3d-float relative">
                        <div class="hero-3d-card">
                            <div class="hero-3d-layer-back"></div>
                            <a :href="items.length ? '{{ url('/portfolio') }}/' + items[active].slug : '{{ route('portfolio') }}'"
                               class="hero-3d-slot no-underline" aria-label="Lihat portofolio">
                                <template x-for="(item, i) in items" :key="'img' + i">
                                    <div class="hero-3d-img" :class="{ active: active === i }">
                                        <img :src="item.image" :alt="item.title" loading="lazy" decoding="async">
                                    </div>
                                </template>
                                <div class="hero-3d-placeholder" x-show="!items.length">
                                    <div class="hero-3d-placeholder-shine"></div>
                                    <div class="hero-3d-placeholder-brand">
                                        <strong>{{ setting('site_name', 'INOWEB') }}</strong>
                                        <span>PORTFOLIO</span>
                                    </div>
                                </div>
                                <div class="hero-3d-shine"></div>
                                <div class="hero-3d-badge" x-show="items.length">
                                    <span class="dot"></span>
                                    <span x-text="items[active].title"></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Navigation arrows -->
                    <div class="flex items-center justify-center gap-4 mt-8">
                        <button @click="prev()" :disabled="items.length <= 1" aria-label="Slide sebelumnya" class="hero-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <template x-if="items.length > 1">
                            <div class="flex items-center gap-2">
                                <template x-for="(item, i) in items" :key="'dot' + i">
                                    <button @click="active = i"
                                            :aria-label="'Ke slide ' + (i + 1)"
                                            :aria-current="active === i ? 'true' : 'false'"
                                            :class="active === i ? 'hero-dot active' : 'hero-dot'"></button>
                                </template>
                            </div>
                        </template>
                        <button @click="next()" :disabled="items.length <= 1" aria-label="Slide berikutnya" class="hero-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Portfolio -->
<section class="py-16 sm:py-24 bg-gray-50" id="portofolio">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PORTFOLIO</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Portofolio Terbaru Kami</h2>
        </div>

        <!-- Filter tabs -->
        <div class="flex overflow-x-auto flex-nowrap lg:flex-wrap justify-start lg:justify-center gap-2 mb-10 pb-2 -mx-2 px-2 scrollbar-hide" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-tab active" data-filter="all">Semua</button>
            @foreach($categories ?? [] as $cat)
            <button class="filter-tab" data-filter="{{ $cat->slug }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $index => $project)
            <div class="portfolio-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-category="{{ $project->category->slug ?? '' }}">
                <div class="portfolio-img">
                    <img src="{{ $project->coverImage()?->image ? asset($project->coverImage()->image) : '' }}" alt="{{ $project->name }}" loading="lazy" decoding="async">
                    <div class="absolute top-4 left-4"><span class="portfolio-badge {{ $project->badge_class }}">{{ $project->category->name }}</span></div>
                </div>
                <div class="p-5">
                    <h5 class="text-base font-bold text-[#0f172a] mb-2">{{ $project->name }}</h5>
                    <p class="text-sm text-[#64748b] line-clamp-2 mb-4">{!! strip_tags($project->description) !!}</p>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('portfolio.detail', $project->slug) }}" class="inline-flex items-center gap-1.5 text-blue-600 text-sm font-semibold hover:gap-2 transition-all">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-outline-dark px-6 py-3.5 text-base">Lihat Semua Portofolio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
    </div>
</section>

<!-- Komitmen -->
<section class="py-16 sm:py-24 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">MENGAPA MEMILIH KAMI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Komitmen Memilih INOWEB</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-50 rounded-2xl p-6 border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                </div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Desain Modern & Elegan</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Tampilan profesional yang menarik dan sesuai tren terkini.</p>
            </div>
            <div class="bg-slate-50 rounded-2xl p-6 border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                </div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Performa Optimal</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Website cepat, ringan, dan ramah mesin pencari.</p>
            </div>
            <div class="bg-slate-50 rounded-2xl p-6 border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Aman & Terpercaya</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Keamanan data dan website Anda adalah prioritas kami.</p>
            </div>
            <div class="bg-slate-50 rounded-2xl p-6 border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Dukungan Penuh</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Tim support kami siap membantu Anda kapan saja.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-16 sm:py-24 bg-white" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">FAQ</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Pertanyaan <span class="text-blue-600">Umum</span></h2>
            <p class="text-[#64748b] text-base leading-relaxed mt-3 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.</p>
        </div>
        <div class="space-y-4">
            @foreach($faqs->take(4) as $i => $faq)
            <div x-data="{ open: false }" class="border border-[#e2e8f0] rounded-2xl overflow-hidden bg-white" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button @click="open = !open"
                        :aria-expanded="open"
                        :id="'faq-btn-{{ $faq->id }}'"
                        aria-controls="faq-panel-{{ $faq->id }}"
                        class="w-full flex items-center justify-between p-5 sm:p-6 text-left bg-white hover:bg-gray-50 transition-colors"
                        :class="{ 'border-b border-[#e2e8f0]': open }">
                    <span class="font-semibold text-[#0f172a] text-sm sm:text-base pr-4">{{ $faq->question }}</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-600 shrink-0 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms id="faq-panel-{{ $faq->id }}" role="region" :aria-labelledby="'faq-btn-{{ $faq->id }}'">
                    <div class="p-5 sm:p-6 text-[#475569] text-sm leading-relaxed">{{ $faq->answer }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @if($faqs->count() > 4)
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('faq') }}" class="btn-outline-dark px-6 py-3.5 text-base">Lihat Semua FAQ <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
        @endif
    </div>
</section>

            <!-- Tentang -->
            @if($aboutSection)
            <section class="py-16 sm:py-24 bg-gray-50" id="tentang">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div data-aos="fade-right">
                            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">TENTANG KAMI</span>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight mb-6">{{ $aboutSection->title }}</h2>
                            <p class="text-[#475569] leading-relaxed mb-8">{!! Illuminate\Support\Str::limit(strip_tags($aboutSection->description), 260) !!}</p>
                            <a href="{{ route('about') }}" class="btn-primary px-6 py-3 text-base inline-flex items-center justify-center gap-2 no-underline">
                                Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        </div>
                        <div data-aos="fade-left" class="flex justify-center lg:justify-end">
                            @if($aboutSection->image)
                            <img src="{{ asset($aboutSection->image) }}" alt="Tentang INOWEB" class="rounded-2xl w-full max-w-md mx-auto lg:mx-0 h-auto object-contain shadow-sm ring-1 ring-slate-100" loading="lazy">
                            @else
                            <div class="w-full max-w-md rounded-2xl border border-gray-100 shadow-sm bg-gradient-to-br from-slate-100 to-slate-200 flex flex-col items-center justify-center px-10 py-20 text-center">
                                <div class="w-16 h-16 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                </div>
                                <p class="font-bold text-[#0f172a] text-lg mb-1">Tentang INOWEB</p>
                                <p class="text-sm text-[#64748b]">Gambar akan tampil di sini setelah di-upload pada Admin &rsaquo; Pengaturan &rsaquo; About Section.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            @endif

<!-- Layanan -->
<section class="py-16 sm:py-24 bg-white" id="layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">LAYANAN KAMI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Solusi Website Profesional<br>Untuk Berbagai Kebutuhan</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card text-left sm:text-center" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="service-icon sm:mx-auto">{!! $service->icon !!}</div>
                <h5 class="text-base sm:text-lg font-bold text-[#0f172a] mb-1.5 sm:mb-2">{{ $service->title }}</h5>
                <p class="text-xs sm:text-sm text-[#64748b] leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimoni (sementara disembunyikan)
@if($testimonials->count())
<section class="py-16 sm:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">TESTIMONI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Apa Kata <span class="text-blue-600">Klien Kami</span></h2>
            <p class="text-[#64748b] text-base leading-relaxed mt-3 max-w-2xl mx-auto">Kepercayaan klien adalah bukti nyata kualitas layanan kami.</p>
        </div>
        <div class="testimonial-carousel" data-aos="fade-up">
            <div id="testimonial-track" class="flex overflow-x-auto snap-x snap-mandatory gap-4 scrollbar-hide pb-2">
                @foreach($testimonials as $i => $testimonial)
                <figure class="testimonial-card w-1/2 lg:w-1/3 shrink-0 snap-start">
                    <div class="testimonial-stars" aria-label="Rating {{ $testimonial->rating }} dari 5">
                        @for($s = 1; $s <= 5; $s++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="{{ $s <= $testimonial->rating ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="{{ $s <= $testimonial->rating ? 'text-[#fbbf24]' : 'text-[#cbd5e1]' }}" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        @endfor
                    </div>
                    <blockquote class="testimonial-text">{{ $testimonial->quote }}</blockquote>
                    <figcaption class="flex items-center gap-3">
                        @if($testimonial->avatar)
                        <div class="author-avatar"><img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" loading="lazy"></div>
                        @else
                        <div class="author-avatar flex items-center justify-center bg-blue-600 text-white font-bold text-sm">{{ mb_strtoupper(mb_substr($testimonial->name, 0, 1)) }}</div>
                        @endif
                        <div>
                            <p class="font-bold text-[#0f172a] text-sm leading-tight">{{ $testimonial->name }}</p>
                            @if($testimonial->role)
                            <p class="text-xs text-[#64748b] leading-tight">{{ $testimonial->role }}</p>
                            @endif
                        </div>
                    </figcaption>
                </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
--}}
<!-- CTA -->
<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center" data-aos="zoom-in">
            <div data-aos="fade-right" data-aos-delay="200">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight mb-4">Siap Mewujudkan Website<br>Impian Anda?</h2>
                <p class="text-[#475569] text-base leading-relaxed mb-6">Konsultasikan kebutuhan Anda sekarang juga dan dapatkan solusi terbaik dari tim profesional INOWEB.</p>
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="text-[#475569] text-sm">Konsultasi Gratis</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="text-[#475569] text-sm">Harga Terjangkau</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="text-[#475569] text-sm">Proses Cepat</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="text-[#475569] text-sm">Hasil Berkualitas</span>
                    </div>
                </div>
            </div>
            <div class="sm:text-right" data-aos="fade-left" data-aos-delay="400">
                <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                    <a href="https://wa.me/{{ $waNum }}?text=Halo,%20saya%20tertarik%20dengan%20layanan%20INOWEB" target="_blank" rel="noopener" class="flex sm:inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-blue-700 transition-all hover:-translate-y-0.5 hover:shadow-lg">
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('portfolio') }}" class="flex sm:inline-flex items-center justify-center gap-2 border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-blue-600 hover:text-white transition-all">
                        Lihat Portofolio
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proses Kerja -->
<section class="py-16 sm:py-24 bg-white" id="proses">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mb-16" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">PROSES KERJA KAMI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight mb-4">Mudah, Terstruktur &amp; Efisien</h2>
            <p class="text-[#64748b] text-base leading-relaxed max-w-2xl mb-0">Kami memiliki proses kerja yang jelas untuk memastikan hasil terbaik sesuai kebutuhan Anda.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <div class="process-card text-center" data-aos="fade-up">
                <div class="process-icon"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Konsultasi</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Kami mendengarkan kebutuhan dan tujuan bisnis Anda.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="process-icon"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Perencanaan</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Menyusun strategi, konsep, dan solusi terbaik.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="process-icon"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Desain & Development</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Membuat desain menarik dan mengembangkan website.</p>
            </div>
            <div class="process-card text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="process-icon"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="12" rx="10" ry="5"/><path d="M2 17v5M2 12v5M22 17v5M22 12v5M12 22v-4"/></svg></div>
                <h5 class="text-base font-bold text-[#0f172a] mb-2">Testing & Revisi</h5>
                <p class="text-sm text-[#64748b] leading-relaxed">Uji coba untuk memastikan semua berjalan sempurna.</p>
            </div>
        </div>
    </div>
</section>
@endsection
