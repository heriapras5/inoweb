@extends('layouts.frontend')

@section('title', 'Kontak - INOWEB')
@section('meta_description', 'Hubungi INOWEB untuk konsultasi pembuatan website profesional. Tersedia WhatsApp, email, dan formulir kontak.')

@section('content')
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Kontak</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Hubungi <span class="text-gradient">Kami</span></h1>
        <p class="text-[#8892b0] text-lg max-w-xl" data-aos="fade-up" data-aos-delay="200">Konsultasikan kebutuhan website Anda. Tim INOWEB siap membantu.</p>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">
            <div data-aos="fade-right">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">KIRIM PESAN</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight mb-6">Diskusikan <span class="text-blue-600">Proyek</span> Anda</h2>
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                    @csrf
                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm flex items-start gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        <div>
                            <p class="font-semibold mb-1">Terjadi kesalahan:</p>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required class="w-full px-4 py-3.5 border rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all {{ $errors->has('name') ? 'border-red-300 bg-red-50' : 'border-[#e2e8f0]' }}">
                            @error('name') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required class="w-full px-4 py-3.5 border rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all {{ $errors->has('email') ? 'border-red-300 bg-red-50' : 'border-[#e2e8f0]' }}">
                            @error('email') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">No. WhatsApp</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890" class="w-full px-4 py-3.5 border rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all {{ $errors->has('phone') ? 'border-red-300 bg-red-50' : 'border-[#e2e8f0]' }}">
                        @error('phone') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Kebutuhan Website</label>
                        <select name="service" class="w-full px-4 py-3.5 border rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all bg-white {{ $errors->has('service') ? 'border-red-300 bg-red-50' : 'border-[#e2e8f0]' }}">
                            <option value="">Pilih layanan...</option>
                            <option value="Company Profile" {{ old('service') == 'Company Profile' ? 'selected' : '' }}>Company Profile</option>
                            <option value="Katalog Produk" {{ old('service') == 'Katalog Produk' ? 'selected' : '' }}>Katalog Produk</option>
                            <option value="Website UMKM" {{ old('service') == 'Website UMKM' ? 'selected' : '' }}>Website UMKM</option>
                            <option value="Sistem Management" {{ old('service') == 'Sistem Management' ? 'selected' : '' }}>Sistem Management</option>
                            <option value="Custom Website" {{ old('service') == 'Custom Website' ? 'selected' : '' }}>Custom Website</option>
                            <option value="Landing Page" {{ old('service') == 'Landing Page' ? 'selected' : '' }}>Landing Page</option>
                        </select>
                        @error('service') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Pesan</label>
                        <textarea name="message" rows="4" placeholder="Ceritakan kebutuhan website Anda..." required class="w-full px-4 py-3.5 border rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all resize-none {{ $errors->has('message') ? 'border-red-300 bg-red-50' : 'border-[#e2e8f0]' }}">{{ old('message') }}</textarea>
                        @error('message') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn-primary w-full sm:w-auto px-8 py-3.5 text-base justify-center">Kirim Pesan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg></button>
                </form>
            </div>
            <div data-aos="fade-left">
                <span class="inline-block text-blue-600 font-bold text-sm tracking-[2px] uppercase mb-3">INFORMASI KONTAK</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a1a2e] leading-tight mb-6">Hubungi Kami <span class="text-blue-600">Langsung</span></h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Alamat</h6><p class="text-sm text-[#64748b]">{{ setting('footer_address', 'Jl. Jepara-Bangsri KM.11, Sekuro Rt10/02, Mlonggo, Jepara') }}</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">WhatsApp</h6><p class="text-sm text-[#64748b]">{{ setting('whatsapp_number', '6283114445775') }}</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Email</h6><p class="text-sm text-[#64748b]">{{ setting('footer_email', 'heriapras5@gmail.com') }}</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Jam Operasional</h6><p class="text-sm text-[#64748b]">Senin - Sabtu: 08.00 - 17.00</p></div>
                    </div>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}" target="_blank" class="btn-primary bg-blue-600 hover:bg-blue-700 px-6 py-4 text-base justify-center flex sm:inline-flex items-center gap-2">
                        Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@php $mapsEmbed = setting('maps_embed'); @endphp
@if($mapsEmbed)
<section class="py-10 sm:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up">
            {!! $mapsEmbed !!}
        </div>
    </div>
</section>
@endif
@endsection
