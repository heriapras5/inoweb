@extends('layouts.frontend')

@section('title', 'Paket Website - INOWEB')

@section('meta_description', 'Pilihan paket website INOWEB: Start, Business, Pro, dan Custom. Harga transparan sudah termasuk domain, hosting, dan SSL.')

@section('content')
<!-- Page Hero -->
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-[#64748b] no-underline hover:text-blue-600 transition-colors">Beranda</a></li>
                <li class="text-[#cbd5e1]">/</li>
                <li class="text-blue-600 font-medium">Paket</li>
            </ol>
        </nav>
        <div data-aos="fade-up">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0f172a] leading-tight mb-4">Paket <span class="text-gradient">Website</span></h1>
            <p class="text-[#64748b] text-base sm:text-lg leading-relaxed max-w-2xl">Bikin bisnis lebih terlihat di internet. Pilih paket sesuai kebutuhan dan anggaran bisnis Anda.</p>
        </div>
    </div>
</section>

<!-- Daftar Paket -->
<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($packages->isNotEmpty())
        @include('frontend.partials.paket-cards')
        @else
        <p class="text-center text-[#64748b]">Paket belum tersedia saat ini. Silakan hubungi kami untuk informasi.</p>
        @endif
    </div>
</section>

<!-- Biaya Perpanjangan -->
<section class="py-16 sm:py-24 bg-gray-50 border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">BIAYA PERPANJANGAN</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] leading-tight">Mulai dari Rp1.000.000<span class="text-xl font-bold text-[#64748b]">/tahun</span></h2>
            <div class="section-accent mx-auto"></div>
        </div>
        <div class="bg-white rounded-2xl border border-[#e2e8f0] p-8 sm:p-10 shadow-sm" data-aos="fade-up">
            <p class="text-sm font-semibold text-[#0f172a] mb-4">Sudah termasuk:</p>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-[#475569]">
                @foreach(['Domain', 'Hosting', 'SSL / HTTPS', 'Backup', 'Maintenance dasar', 'Monitoring website'] as $item)
                <li class="flex items-start gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>{{ $item }}</span>
                </li>
                @endforeach
            </ul>
            <p class="text-xs text-gray-400 leading-relaxed mt-6 pt-5 border-t border-gray-100"><span class="font-semibold">Catatan:</span> perubahan desain, penambahan halaman, fitur baru, dan input produk dalam jumlah besar dikenakan biaya tambahan.</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12" data-aos="fade-up">
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">Masih Ragu Pilih Paket?</h2>
                <p class="text-white/80 text-base mt-2 max-w-xl">Konsultasikan kebutuhan website Anda dengan tim INOWEB. Gratis!</p>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-2">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6285736186308') }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20paket%20website%20INOWEB" target="_blank" rel="noopener" class="inline-flex items-center justify-center bg-white text-blue-600 px-8 py-3.5 rounded-full font-semibold text-base no-underline hover:bg-blue-50 transition-all hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
