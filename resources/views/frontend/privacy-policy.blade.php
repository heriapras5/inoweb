@extends('layouts.frontend')

@section('title', 'Kebijakan Privasi - INOWEB')
@section('meta_description', 'Kebijakan privasi INOWEB menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda.')

@section('content')
<section class="bg-gradient-hero pt-20 sm:pt-32 pb-16 sm:pb-20 relative overflow-hidden">
    <x-hero-bg />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex mb-6 text-sm" data-aos="fade-up">
            <ol class="flex items-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white/60 no-underline hover:text-white transition-colors">Beranda</a></li>
                <li class="text-white/40">/</li>
                <li class="text-blue-400 font-medium">Kebijakan Privasi</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Kebijakan <span class="text-gradient">Privasi</span></h1>
    </div>
</section>

<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-gray max-w-none">
        <div class="space-y-8 text-[#475569] leading-relaxed">
            <p>Kebijakan privasi ini menjelaskan bagaimana INOWEB mengumpulkan, menggunakan, dan melindungi informasi pribadi yang Anda berikan saat menggunakan website kami.</p>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">1. Informasi yang Kami Kumpulkan</h2>
                <p>Kami dapat mengumpulkan informasi berikut:</p>
                <ul class="list-disc pl-6 space-y-2 mt-2">
                    <li>Nama lengkap</li>
                    <li>Alamat email</li>
                    <li>Nomor telepon / WhatsApp</li>
                    <li>Informasi perusahaan</li>
                    <li>Data penggunaan website (cookies, analytics)</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">2. Penggunaan Informasi</h2>
                <p>Informasi yang kami kumpulkan digunakan untuk:</p>
                <ul class="list-disc pl-6 space-y-2 mt-2">
                    <li>Menjawab pertanyaan dan memberikan layanan yang Anda minta</li>
                    <li>Mengirimkan informasi terkait layanan kami</li>
                    <li>Meningkatkan kualitas website dan layanan</li>
                    <li>Keperluan administrasi dan komunikasi</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">3. Perlindungan Data</h2>
                <p>Kami berkomitmen untuk menjaga keamanan informasi pribadi Anda. Kami menerapkan langkah-langkah keamanan yang sesuai untuk melindungi data dari akses tidak sah, perubahan, pengungkapan, atau penghancuran.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">4. Cookies</h2>
                <p>Website kami menggunakan cookies untuk meningkatkan pengalaman pengguna. Cookies adalah file kecil yang disimpan di perangkat Anda yang membantu kami menganalisis penggunaan website dan mengingat preferensi Anda.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">5. Pihak Ketiga</h2>
                <p>Kami tidak akan menjual, menukar, atau mentransfer informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">6. Hak Anda</h2>
                <p>Anda memiliki hak untuk:</p>
                <ul class="list-disc pl-6 space-y-2 mt-2">
                    <li>Mengakses data pribadi yang kami simpan</li>
                    <li>Meminta koreksi data yang tidak akurat</li>
                    <li>Meminta penghapusan data pribadi Anda</li>
                    <li>Menolak penggunaan data untuk tujuan pemasaran</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">7. Perubahan Kebijakan</h2>
                <p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diumumkan melalui halaman ini.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">8. Kontak</h2>
                <p>Jika Anda memiliki pertanyaan tentang kebijakan privasi ini, silakan hubungi kami melalui:</p>
                <p class="mt-2">Email: info@inoweb.id<br>WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>
    </div>
</section>
<!-- CTA -->
<section class="bg-gradient-blue py-16 sm:py-20 relative overflow-hidden cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 items-center" data-aos="zoom-in">
            <div data-aos="fade-right" data-aos-delay="200">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">Siap Membangun Website Profesional untuk Bisnis Anda?</h2>
                <p class="text-white/70 text-base leading-relaxed">Konsultasikan kebutuhan Anda sekarang juga dan dapatkan solusi terbaik dari tim profesional INOWEB.</p>
            </div>
            <div class="sm:text-right" data-aos="fade-left" data-aos-delay="400">
                <a href="https://wa.me/{{ setting('whatsapp_number', '6283114445775') }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20layanan%20INOWEB" target="_blank" class="flex sm:inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-base no-underline hover:bg-gray-100 transition-all hover:-translate-y-0.5 hover:shadow-lg">
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
