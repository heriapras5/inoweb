@extends('layouts.frontend')

@section('title', 'FAQ - INOWEB')
@section('meta_description', 'Pertanyaan yang sering diajukan seputar layanan pembuatan website INOWEB.')

@section('content')
<section class="bg-gradient-hero pt-32 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
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
                        class="w-full flex items-center justify-between p-6 text-left bg-white hover:bg-gray-50 transition-colors"
                        :class="{ 'border-b border-[#e2e8f0]': open }">
                    <span class="font-semibold text-[#1a1a2e] pr-4">{{ $faq->question }}</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-600 shrink-0 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms>
                    <div class="p-6 text-[#475569] leading-relaxed">{{ $faq->answer }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Masih punya pertanyaan?</h2>
            <p class="text-white/70 text-lg max-w-2xl mx-auto mb-8">Hubungi kami langsung via WhatsApp untuk konsultasi gratis!</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5">Tanya via WhatsApp</a>
        </div>
    </div>
</section>
@endsection
