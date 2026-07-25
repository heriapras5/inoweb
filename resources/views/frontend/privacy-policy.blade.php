@extends('layouts.frontend')

@section('title', 'Kebijakan Privasi - INOWEB')
@section('meta_description', 'Kebijakan privasi INOWEB menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda.')

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
@endsection
