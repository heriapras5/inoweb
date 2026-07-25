@extends('layouts.frontend')

@section('title', 'Layanan - INOWEB')
@section('meta_description', 'INOWEB menyediakan berbagai layanan pembuatan website profesional: Company Profile, Katalog Produk, Website UMKM, dan lainnya.')

@section('content')
<section class="bg-gradient-hero pt-32 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-50">
        <div class="absolute w-px h-3/5 top-1/5 left-1/5 bg-blue-600/10"></div>
        <div class="absolute w-px h-2/5 top-1/3 right-1/4 bg-blue-600/10"></div>
        <div class="absolute w-1.5 h-1.5 bg-blue-600/50 rounded-full top-1/4 left-[18%]"></div>
        <div class="absolute w-1.5 h-1.5 bg-blue-600/50 rounded-full top-[45%] right-[23%]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Layanan</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Layanan <span class="text-gradient">Kami</span></h1>
        <p class="text-[#8892b0] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Kami menyediakan berbagai solusi website profesional yang dirancang khusus sesuai kebutuhan bisnis Anda.</p>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="service-icon">{!! $service->icon !!}</div>
                <h5 class="text-lg font-bold text-[#1a1a2e] mb-2.5">{{ $service->title }}</h5>
                <p class="text-sm text-[#64748b] leading-relaxed mb-4">{{ $service->description }}</p>
                <ul class="space-y-2 mb-4">
                    @foreach($service->features as $feature)
                    <li class="flex items-center gap-2 text-sm text-[#475569]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($service->title) }}" target="_blank" class="text-blue-600 font-semibold text-sm no-underline inline-flex items-center gap-1.5 hover:gap-2.5 transition-all">Pesan via WhatsApp <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Tidak menemukan layanan yang sesuai?</h2>
            <p class="text-white/70 text-lg max-w-2xl mx-auto mb-8">Kami juga melayani pembuatan website custom sesuai kebutuhan spesifik bisnis Anda. Konsultasikan gratis!</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5">Hubungi via WhatsApp</a>
        </div>
    </div>
</section>
@endsection
