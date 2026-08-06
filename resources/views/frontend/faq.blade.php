@extends('layouts.frontend')

@section('title', 'FAQ - INOWEB')
@section('meta_description', 'Pertanyaan yang sering diajukan seputar layanan pembuatan website INOWEB.')

@section('content')
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">FAQ</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Pertanyaan <span class="text-gradient">Umum</span></h1>
        <p class="text-[#8892b0] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Temukan jawaban dari pertanyaan yang sering diajukan seputar layanan INOWEB.</p>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @foreach($faqs as $i => $faq)
            <div x-data="{ open: false }" class="border border-[#e2e8f0] rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button @click="open = !open"
                        :aria-expanded="open"
                        :id="'faq-btn-{{ $faq->id }}'"
                        aria-controls="faq-panel-{{ $faq->id }}"
                        class="w-full flex items-center justify-between p-6 text-left bg-white hover:bg-gray-50 transition-colors"
                        :class="{ 'border-b border-[#e2e8f0]': open }">
                    <span class="font-semibold text-[#1a1a2e] pr-4">{{ $faq->question }}</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-600 shrink-0 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms id="faq-panel-{{ $faq->id }}" role="region" :aria-labelledby="'faq-btn-{{ $faq->id }}'">
                    <div class="p-6 text-[#475569] leading-relaxed">{{ $faq->answer }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute w-72 h-72 rounded-full bg-white/5 -top-20 -right-20"></div>
        <div class="absolute w-48 h-48 rounded-full bg-white/5 -bottom-16 -left-16"></div>
        <div class="absolute top-1/4 left-1/3 w-2 h-2 bg-white/20 rounded-full"></div>
        <div class="absolute top-1/2 right-1/4 w-1.5 h-1.5 bg-white/20 rounded-full"></div>
        <div class="absolute bottom-1/3 left-1/5 w-1 h-1 bg-white/20 rounded-full"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div class="text-center lg:text-left">
                <span class="inline-block text-[0.7rem] font-bold tracking-[0.2em] uppercase text-blue-300 mb-3">MASIH BINGUNG?</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-4">Konsultasi Gratis <span class="text-blue-300">via WhatsApp</span></h2>
                <p class="text-white/70 text-base max-w-lg">Tim kami siap menjawab semua pertanyaan Anda tentang pembuatan website. Respon cepat, tanpa komitmen.</p>
                <div class="flex flex-wrap gap-3 mt-6 justify-center lg:justify-start">
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Gratis Konsultasi
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Respon Cepat
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Tanpa Komitmen
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center lg:items-end gap-4">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20layanan%20pembuatan%20website" target="_blank" rel="noopener" class="inline-flex items-center gap-3 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    Tanya via WhatsApp
                </a>
                <p class="text-white/40 text-xs">Klik tombol di atas untuk chat langsung</p>
            </div>
        </div>
    </div>
</section>
@endsection
