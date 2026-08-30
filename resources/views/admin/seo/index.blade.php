@extends('admin.layouts.app')
@section('title', 'Pengaturan SEO')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Pengaturan SEO</span>
</nav>

<form method="POST" action="{{ route('admin.seo.update') }}" enctype="multipart/form-data">
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
        {{-- Meta Tags --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Meta Tags</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Judul & deskripsi yang tampil di hasil pencarian (Google).</p>
            </div>
            <div class="p-8 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">SEO Title</label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $settings['seo_title'] ?? '') }}" placeholder="INOWEB - Inovasi Website" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Kosongkan untuk memakai nama website. Maks 60 karakter ideal.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Meta Description</label>
                    <textarea name="seo_description" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="Deskripsi singkat website Anda untuk mesin pencari.">{{ old('seo_description', $settings['seo_description'] ?? '') }}</textarea>
                    <p class="text-xs text-[#94a3b8] mt-1.5">Kosongkan untuk memakai deskripsi website. Maks 160 karakter ideal.</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Keywords</label>
                        <input type="text" name="seo_keywords" value="{{ old('seo_keywords', $settings['seo_keywords'] ?? '') }}" placeholder="website, jasa pembuatan website, desain web" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                        <p class="text-xs text-[#94a3b8] mt-1.5">Pisahkan dengan koma.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#475569] mb-1.5">Author</label>
                        <input type="text" name="seo_author" value="{{ old('seo_author', $settings['seo_author'] ?? '') }}" placeholder="INOWEB" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Robots</label>
                    <select name="seo_robots" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow bg-white">
                        @php $robots = old('seo_robots', $settings['seo_robots'] ?? 'index,follow'); @endphp
                        <option value="index,follow" {{ $robots === 'index,follow' ? 'selected' : '' }}>index, follow (default)</option>
                        <option value="noindex,follow" {{ $robots === 'noindex,follow' ? 'selected' : '' }}>noindex, follow</option>
                        <option value="index,nofollow" {{ $robots === 'index,nofollow' ? 'selected' : '' }}>index, nofollow</option>
                        <option value="noindex,nofollow" {{ $robots === 'noindex,nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Open Graph --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Open Graph / Sosial</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Gambar & tautan yang tampil saat dibagikan di media sosial.</p>
            </div>
            <div class="p-8 space-y-4">
                <div x-data="{ preview: null, removeImage: false }">
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">OG Image</label>
                    <input type="file" name="seo_og_image" accept="image/png,image/jpeg,image/jpg,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeImage = false"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Rekomendasi 1200x630px. PNG, JPG, WEBP. Maks 2MB.</p>
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-24 rounded-xl shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button" class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                    </div>
                    @php $ogImage = $settings['seo_og_image'] ?? ''; @endphp
                    @if($ogImage)
                    <div x-show="!preview && !removeImage" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($ogImage) }}" class="h-24 rounded-xl border border-gray-100 shadow-sm" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_seo_og_image" value="1" @change="removeImage = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus gambar
                        </label>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Analytics & Lanjutan --}}
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">Analytics & Lanjutan</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Integrasi pelacakan dan tautan kanonikal.</p>
            </div>
            <div class="p-8 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Google Analytics ID</label>
                    <input type="text" name="seo_google_analytics" value="{{ old('seo_google_analytics', $settings['seo_google_analytics'] ?? '') }}" placeholder="G-XXXXXXXXXX" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">ID pengukuran (mis. G-XXXXXXXXXX). Kosongkan jika tidak digunakan.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Facebook Pixel ID</label>
                    <input type="text" name="seo_facebook_pixel" value="{{ old('seo_facebook_pixel', $settings['seo_facebook_pixel'] ?? '') }}" placeholder="1234567890" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">ID Pixel Facebook. Kosongkan jika tidak digunakan.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#475569] mb-1.5">Canonical URL</label>
                    <input type="url" name="seo_canonical" value="{{ old('seo_canonical', $settings['seo_canonical'] ?? '') }}" placeholder="https://domainanda.com" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">URL utama website. Kosongkan untuk otomatis mengikuti halaman.</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all text-[#64748b]">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">Simpan Pengaturan SEO</button>
        </div>
    </div>
</form>
@endsection
