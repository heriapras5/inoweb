@extends('layouts.frontend')

@section('title', 'Tentang - INOWEB')
@section('meta_description', 'Kenali lebih dekat INOWEB, pusat layanan pembuatan website profesional yang membantu bisnis Anda go digital.')

@section('content')
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Beranda</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li class="text-blue-600 font-medium">Tentang</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#0f172a] mb-4" data-aos="fade-up" data-aos-delay="100">Tentang <span class="text-gradient">Kami</span></h1>
        <p class="text-[#64748b] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">{{ $aboutSection->subtitle ?: 'Kenali lebih dekat siapa kami dan apa yang kami lakukan untuk membantu bisnis Anda.' }}</p>
    </div>
</section>

<section class="pt-8 pb-16 sm:pt-10 sm:pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">TENTANG KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight mb-6">{{ $aboutSection->title ?: 'Mitra Terpercaya untuk Solusi Website Profesional' }}</h2>
                <div class="text-[#475569] leading-relaxed prose-content">{!! $aboutSection->description !!}</div>
            </div>
            @if($aboutSection->image)
            <div data-aos="fade-left" class="flex justify-center lg:justify-start">
                <img src="{{ $aboutSection->image ? asset($aboutSection->image) : '' }}" alt="Tentang INOWEB" class="rounded-2xl w-full max-w-md mx-auto lg:mx-0 h-auto object-contain shadow-sm ring-1 ring-slate-100">
            </div>
            @endif
        </div>
    </div>
</section>

@if($aboutSection->vision || ($aboutSection->mission && count($aboutSection->mission)))
<section class="py-16 sm:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">VISI & MISI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e]">Visi & Misi <span class="text-blue-600">Kami</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            @if($aboutSection->vision)
            <div class="bg-white rounded-2xl p-10 border border-[#e2e8f0] text-center" data-aos="fade-right">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#1a1a2e] mb-4">Visi</h3>
                <div class="text-[#475569] leading-relaxed prose-content">{!! $aboutSection->vision !!}</div>
            </div>
            @endif
            @if($aboutSection->mission && count($aboutSection->mission))
            <div class="bg-white rounded-2xl p-10 border border-[#e2e8f0] text-center" data-aos="fade-left">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#1a1a2e] mb-4">Misi</h3>
                <ul class="space-y-3 text-left">
                    @foreach($aboutSection->mission as $item)
                    <li class="flex items-start gap-3 text-[#475569]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Tertarik Bekerja Sama?</h2>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mb-8">Konsultasikan kebutuhan website Anda dengan tim INOWEB. Gratis!</p>
            <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}" target="_blank" rel="noopener" class="flex sm:inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-blue-50 transition-all hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
