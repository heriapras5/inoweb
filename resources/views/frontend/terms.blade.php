@extends('layouts.frontend')

@section('title', 'Syarat & Ketentuan - INOWEB')
@section('meta_description', 'Syarat dan ketentuan penggunaan layanan jasa pembuatan website dari INOWEB.')

@section('content')
<section class="bg-gradient-hero pt-40 pb-20 relative overflow-hidden">
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
                <li class="text-blue-400 font-medium">Syarat & Ketentuan</li>
            </ol>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">Syarat & <span class="text-gradient">Ketentuan</span></h1>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-8 text-[#475569] leading-relaxed">
            <p>Dengan menggunakan layanan INOWEB, Anda menyetujui syarat dan ketentuan berikut. Harap baca dengan seksama sebelum menggunakan layanan kami.</p>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">1. Layanan</h2>
                <p>INOWEB menyediakan jasa pembuatan website profesional. Lingkup pekerjaan akan disepakati bersama sebelum proyek dimulai dan dituangkan dalam proposal atau kontrak kerja.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">2. Hak Kekayaan Intelektual</h2>
                <p>Setelah pembayaran lunas, hak kepemilikan penuh atas website (source code, desain, dan konten) menjadi milik klien. INOWEB berhak mencantumkan kredit sebagai pengembang di bagian footer website.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">3. Pembayaran</h2>
                <p>Sistem pembayaran dilakukan secara bertahap sesuai kesepakatan. Umumnya terdiri dari:</p>
                <ul class="list-disc pl-6 space-y-2 mt-2">
                    <li>DP (Down Payment) di awal proyek</li>
                    <li>Pembayaran progress di tengah pengerjaan</li>
                    <li>Pelunasan saat website selesai dan siap launching</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">4. Revisi</h2>
                <p>Jumlah revisi desain akan disepakati di awal proyek. Revisi di luar kesepakatan akan dikenakan biaya tambahan. Revisi konten bersifat tak terbatas selama masa pengerjaan.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">5. Konten</h2>
                <p>Klien bertanggung jawab atas konten (teks, gambar, video) yang diberikan kepada INOWEB. INOWEB tidak bertanggung jawab atas pelanggaran hak cipta konten yang disediakan klien.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">6. Pembatalan</h2>
                <p>Jika proyek dibatalkan oleh klien setelah pekerjaan dimulai, DP yang sudah dibayarkan tidak dapat dikembalikan. Pembatalan dari pihak INOWEB akan memberikan pengembalian dana penuh.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">7. Garansi</h2>
                <p>Kami memberikan garansi 30 hari setelah website launching untuk perbaikan bug dan masalah teknis. Garansi tidak termasuk perubahan konten, penambahan fitur, atau masalah yang disebabkan oleh pihak ketiga.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">8. Hosting & Domain</h2>
                <p>Jika INOWEB yang mengurus hosting dan domain, biaya berlangganan tahunan menjadi tanggung jawab klien. INOWEB akan memberikan informasi login dan akses penuh ke panel hosting.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">9. Kerahasiaan</h2>
                <p>INOWEB menjaga kerahasiaan data dan informasi klien selama dan setelah proyek selesai. Data tidak akan digunakan untuk kepentingan di luar proyek tanpa izin klien.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#1a1a2e] mb-4">10. Perubahan Ketentuan</h2>
                <p>INOWEB berhak mengubah syarat dan ketentuan ini sewaktu-waktu. Perubahan akan diinformasikan melalui halaman ini.</p>
            </div>
        </div>
    </div>
</section>
@endsection
