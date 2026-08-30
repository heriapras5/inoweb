@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Pengaturan</span>
</nav>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    @if($errors->any())
    <div class="max-w-4xl mx-auto mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">
        <p class="text-sm font-semibold text-red-700 mb-1">Terdapat {{ $errors->count() }} masalah pada form:</p>
        <ul class="list-disc list-inside text-xs text-red-600 space-y-0.5">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-4xl mx-auto space-y-6">
        {{-- Identitas --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Informasi Website</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Identitas dasar website Anda.</p>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Nama Website</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'INOWEB') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Tagline</label>
                        <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'INOVASI WEBSITE') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Deskripsi Website (meta)</label>
                    <textarea name="site_description" rows="3" class="summernote">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '6285736186308') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="6285736186308">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Format: kode negara + nomor, tanpa + atau spasi.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Alamat Footer</label>
                    <textarea name="footer_address" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="Jl. Contoh No. 123, Kota">{{ old('footer_address', $settings['footer_address'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Email Footer</label>
                    <input type="email" name="footer_email" value="{{ old('footer_email', $settings['footer_email'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="email@example.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Google Maps Embed</label>
                    <textarea name="maps_embed" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-mono text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="&lt;iframe src=&quot;https://www.google.com/maps/embed?pb=...&quot;&gt;&lt;/iframe&gt;">{{ old('maps_embed', $settings['maps_embed'] ?? '') }}</textarea>
                    <p class="text-xs text-[#94a3b8] mt-1.5">Kode embed iframe Google Maps. Kosongkan untuk tidak menampilkan peta.</p>
                </div>
            </div>
        </div>

        {{-- Sosial Media --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Sosial Media</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Tautan media sosial yang tampil di footer.</p>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Facebook</label>
                        <input type="url" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="https://facebook.com/namapage">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Instagram</label>
                        <input type="url" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="https://instagram.com/namauser">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">LinkedIn</label>
                        <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="https://linkedin.com/in/namauser">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">YouTube</label>
                        <input type="url" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="https://youtube.com/@channel">
                    </div>
                </div>
                <p class="text-xs text-[#94a3b8]">Kosongkan jika tidak ingin menampilkan ikon media sosial tertentu.</p>
            </div>
        </div>

        {{-- Logo & Favicon --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Logo & Favicon</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Atur logo dan ikon tab browser.</p>
            </div>
            <div class="p-8 space-y-6">
                <div x-data="{ preview: null, removeImage: false }">
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Logo Gambar</label>
                    <input type="file" name="logo_image" accept="image/png,image/jpeg,image/jpg,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeImage = false"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Kosongkan untuk menggunakan logo teks + ikon default. Format: PNG, JPG, WEBP. Maks 2MB.</p>
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-14 rounded-xl shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                    </div>
                    @php $logoImage = $settings['logo_image'] ?? ''; @endphp
                    @if($logoImage)
                    <div x-show="!preview && !removeImage" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($logoImage) }}" class="h-14 rounded-xl border border-gray-100 shadow-sm" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_logo_image" value="1" @change="removeImage = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus logo
                        </label>
                    </div>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Logo Ikon (SVG)</label>
                    <textarea name="logo_icon" rows="4" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-mono text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">{{ old('logo_icon', $settings['logo_icon'] ?? '') }}</textarea>
                    <p class="text-xs text-[#94a3b8] mt-1.5">SVG icon yang tampil jika logo gambar kosong.</p>
                </div>

                <div x-data="{ preview: null, removeFavicon: false }">
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Favicon</label>
                    <input type="file" name="favicon" accept="image/png,image/jpeg,image/jpg,image/x-icon,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeFavicon = false"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Format: PNG, JPG, ICO, WEBP. Maks 1MB.</p>
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-10 rounded-lg shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                    </div>
                    @php $favicon = $settings['favicon'] ?? ''; @endphp
                    @if($favicon)
                    <div x-show="!preview && !removeFavicon" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($favicon) }}" class="h-10 rounded-lg border border-gray-100 shadow-sm" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_favicon" value="1" @change="removeFavicon = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus favicon
                        </label>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tentang --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Section Tentang</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Konten halaman tentang kami.</p>
            </div>
            <div class="p-8 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Judul</label>
                        <input type="text" name="about_title" value="{{ old('about_title', $about->title) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Subjudul</label>
                        <input type="text" name="about_subtitle" value="{{ old('about_subtitle', $about->subtitle) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Deskripsi</label>
                    <textarea name="about_description" rows="5" class="summernote">{{ old('about_description', $about->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Visi</label>
                    <textarea name="about_vision" rows="3" class="summernote">{{ old('about_vision', $about->vision) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Misi (satu baris per item)</label>
                    <textarea name="about_mission" rows="5" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="Menyediakan website berkualitas&#10;Membangun sistem yang scalable&#10;Memberikan support terbaik">{{ old('about_mission', $about->mission ? implode("\n", $about->mission) : '') }}</textarea>
                </div>
                <div x-data="{ preview: null, removeAboutImage: false }">
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Gambar</label>
                    <input type="file" name="about_image" accept="image/png,image/jpeg,image/jpg,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeAboutImage = false"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-28 rounded-xl shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                    </div>
                    @if($about->image)
                    <div x-show="!preview && !removeAboutImage" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($about->image) }}" class="h-28 rounded-xl shadow-sm border border-gray-100" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_about_image" value="1" @change="removeAboutImage = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus gambar
                        </label>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-8 py-3 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">
                Simpan Pengaturan
            </button>
        </div>
    </div>
</form>
@endsection