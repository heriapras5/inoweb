@extends('layouts.frontend')

@section('title', 'Tentang Kami - INOWEB')
@section('meta_description', 'Kenali lebih dekat INOWEB, pusat layanan pembuatan website profesional yang membantu bisnis Anda go digital.')

@section('content')
<section class="bg-gradient-hero pt-32 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Tentang Kami</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Tentang <span class="text-gradient">INOWEB</span></h1>
        <p class="text-[#8892b0] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Kenali lebih dekat siapa kami dan apa yang kami lakukan untuk membantu bisnis Anda.</p>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">TENTANG KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight mb-6">Mitra Terpercaya untuk Solusi <span class="text-blue-600">Website</span> Profesional</h2>
                <p class="text-[#475569] leading-relaxed mb-4">INOWEB adalah pusat layanan pembuatan website profesional yang berdedikasi untuk membantu bisnis, UMKM, organisasi, dan personalia memiliki website berkualitas dengan harga terjangkau.</p>
                <p class="text-[#475569] leading-relaxed mb-4">Berdiri sejak 2022, kami telah membantu lebih dari 50 klien dari berbagai industri untuk go digital dan mengembangkan bisnis mereka melalui website profesional.</p>
                <p class="text-[#475569] leading-relaxed">Kami percaya bahwa setiap bisnis berhak memiliki website berkualitas tanpa harus merogoh biaya mahal. Dengan pendekatan yang personal dan teknologi modern, kami siap mewujudkan website impian Anda.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">VISI & MISI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e]">Visi & Misi <span class="text-blue-600">Kami</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl p-10 border border-[#e2e8f0] text-center" data-aos="fade-right">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#1a1a2e] mb-4">Visi</h3>
                <p class="text-[#475569] leading-relaxed">Menjadi pusat layanan pembuatan website modern yang profesional, terpercaya, dan inovatif di Indonesia.</p>
            </div>
            <div class="bg-white rounded-2xl p-10 border border-[#e2e8f0] text-center" data-aos="fade-left">
                <div class="w-14 h-14 bg-blue-600/10 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#1a1a2e] mb-4">Misi</h3>
                <ul class="space-y-3 text-left">
                    <li class="flex items-start gap-3 text-[#475569]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg> Membantu UMKM go digital dengan website profesional</li>
                    <li class="flex items-start gap-3 text-[#475569]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg> Menyediakan website berkualitas dengan harga terjangkau</li>
                    <li class="flex items-start gap-3 text-[#475569]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg> Memberikan support terbaik untuk setiap klien</li>
                    <li class="flex items-start gap-3 text-[#475569]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg> Membangun sistem yang scalable dan modern</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Tertarik Bekerja Sama?</h2>
            <p class="text-white/70 text-lg max-w-2xl mx-auto mb-8">Konsultasikan kebutuhan website Anda dengan tim INOWEB. Gratis!</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-green-600 transition-all hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="20" height="20">
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6z"/>
                </svg>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
