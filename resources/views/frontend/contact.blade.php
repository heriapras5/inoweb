@extends('layouts.frontend')

@section('title', 'Kontak - INOWEB')
@section('meta_description', 'Hubungi INOWEB untuk konsultasi pembuatan website profesional. Tersedia WhatsApp, email, dan formulir kontak.')

@section('content')
<section class="bg-gradient-hero pt-32 sm:pt-40 pb-16 sm:pb-20 relative overflow-hidden">
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
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6">{{ session('success') }}</div>
                @endif
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Masukkan nama Anda" required class="w-full px-4 py-3 border border-[#e2e8f0] rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Email</label>
                            <input type="email" name="email" placeholder="Masukkan email Anda" required class="w-full px-4 py-3 border border-[#e2e8f0] rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">No. WhatsApp</label>
                        <input type="tel" name="phone" placeholder="Contoh: 081234567890" class="w-full px-4 py-3 border border-[#e2e8f0] rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Kebutuhan Website</label>
                        <select name="service" class="w-full px-4 py-3 border border-[#e2e8f0] rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all bg-white">
                            <option value="">Pilih layanan...</option>
                            <option>Company Profile</option>
                            <option>Katalog Produk</option>
                            <option>Website UMKM</option>
                            <option>Sistem Management</option>
                            <option>Custom Website</option>
                            <option>Landing Page</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#1a1a2e] mb-2">Pesan</label>
                        <textarea name="message" rows="4" placeholder="Ceritakan kebutuhan website Anda..." required class="w-full px-4 py-3 border border-[#e2e8f0] rounded-xl text-sm outline-none focus:border-blue-600 focus:shadow-[0_0_0_3px_rgba(37,99,235,0.1)] transition-all resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full sm:w-auto px-8 py-3 text-base justify-center">Kirim Pesan <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg></button>
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
                        <div><h6 class="font-semibold text-[#1a1a2e]">Alamat</h6><p class="text-sm text-[#64748b]">Jl. Digital Innovation No. 10 Yogyakarta, Indonesia</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Telepon</h6><p class="text-sm text-[#64748b]">+62 812-3456-7890</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Email</h6><p class="text-sm text-[#64748b]">info@inoweb.id</p></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div><h6 class="font-semibold text-[#1a1a2e]">Jam Operasional</h6><p class="text-sm text-[#64748b]">Senin - Sabtu: 08.00 - 17.00</p></div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn-primary bg-green-500 hover:bg-green-600 px-6 py-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 sm:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.123456789!2d110.369!3d-7.801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDgnMDMuNiJTIDExMMKwMjInMDguNCJF!5e0!3m2!1sid!2sid!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
