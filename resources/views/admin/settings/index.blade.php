@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Nama Website</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'INOWEB') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Tagline</label>
                <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'PUSAT WEBSITE') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Deskripsi Website (meta)</label>
            <textarea name="site_description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
        </div>
        <hr class="border-gray-100">
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Logo Gambar (URL)</label>
            <input type="url" name="logo_image" value="{{ old('logo_image', $settings['logo_image'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" placeholder="https://example.com/logo.png">
            <p class="text-xs text-[#64748b] mt-1.5">Kosongkan untuk menggunakan logo teks + ikon default.</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Logo Ikon (SVG)</label>
            <textarea name="logo_icon" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm font-mono text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">{{ old('logo_icon', $settings['logo_icon'] ?? '') }}</textarea>
            <p class="text-xs text-[#64748b] mt-1.5">SVG icon yang tampil jika logo_image kosong.</p>
        </div>
        <hr class="border-gray-100">
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Favicon (URL)</label>
            <input type="url" name="favicon" value="{{ old('favicon', $settings['favicon'] ?? '') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" placeholder="https://example.com/favicon.ico">
            <p class="text-xs text-[#64748b] mt-1.5">Kosongkan untuk menggunakan favicon default.</p>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">Simpan Pengaturan</button>
        </div>
    </form>
</div>
@endsection
