@extends('layouts.frontend')

@section('title', 'Layanan - INOWEB')
@section('meta_description', 'INOWEB menyediakan berbagai layanan pembuatan website profesional: Company Profile, Katalog Produk, Website UMKM, dan lainnya.')

@section('content')
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Beranda</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li class="text-blue-600 font-medium">Layanan</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#0f172a] mb-4" data-aos="fade-up" data-aos-delay="100">Layanan <span class="text-gradient">Kami</span></h1>
        <p class="text-[#64748b] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Kami menyediakan berbagai solusi website profesional yang dirancang khusus sesuai kebutuhan bisnis Anda.</p>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card flex flex-col text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="service-icon mx-auto">{!! $service->icon !!}</div>
                <h5 class="text-lg font-bold text-[#1a1a2e] mb-2.5 text-center">{{ $service->title }}</h5>
                <p class="text-sm text-[#64748b] leading-relaxed mb-4">{{ $service->description }}</p>
                <ul class="space-y-1.5 sm:space-y-2 mb-4 flex-1">
                    @foreach($service->features as $feature)
                    <li class="flex items-center gap-2 text-sm text-[#475569]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($service->title) }}" target="_blank" rel="noopener" class="text-blue-600 font-semibold text-sm no-underline inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg hover:bg-blue-50 transition-all mt-auto">Pesan via WhatsApp</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Tidak menemukan layanan yang sesuai?</h2>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mb-8">Kami juga melayani pembuatan website custom sesuai kebutuhan spesifik bisnis Anda. Konsultasikan gratis!</p>
            <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}" target="_blank" rel="noopener" class="flex sm:inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-blue-50 transition-all hover:-translate-y-0.5 hover:shadow-xl shadow-lg">Hubungi via WhatsApp</a>
        </div>
    </div>
</section>
@endsection
