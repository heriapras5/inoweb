@extends('admin.layouts.app')
@section('title', $heroSection->exists ? 'Edit Slide Hero' : 'Tambah Slide Hero')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.hero-sections.index') }}" class="hover:text-blue-600 transition-colors">Hero / Slider</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">{{ $heroSection->exists ? 'Edit' : 'Tambah' }}</span>
</nav>
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-8 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">{{ $heroSection->exists ? 'Edit Slide Hero' : 'Tambah Slide Hero' }}</h2>
            <p class="text-sm text-[#64748b] mt-0.5">{{ $heroSection->exists ? 'Ubah data slide hero.' : 'Buat slide hero baru.' }}</p>
        </div>
        <form action="{{ $heroSection->exists ? route('admin.hero-sections.update', $heroSection) : route('admin.hero-sections.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf @if($heroSection->exists) @method('PUT') @endif
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Judul</label>
                <input type="text" name="title" value="{{ old('title', $heroSection->title) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" required>
                @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Subjudul</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $heroSection->subtitle) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                @error('subtitle')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Deskripsi</label>
                <textarea name="description" class="summernote">{{ old('description', $heroSection->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Teks Tombol</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $heroSection->button_text) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">URL Tombol</label>
                    <input type="text" name="button_url" value="{{ old('button_url', $heroSection->button_url) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" placeholder="https://wa.me/...">
                </div>
            </div>
            <div x-data="{ previews: [], removeImage: false }">
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Gambar Slide {{ !$heroSection->exists ? '(bisa upload beberapa)' : '' }}</label>
                <p class="text-xs text-[#94a3b8] mb-2">Upload gambar untuk ditampilkan di dalam monitor pada hero section.</p>
                <input type="file" name="{{ $heroSection->exists ? 'image' : 'images[]' }}" {{ $heroSection->exists ? '' : 'multiple' }} accept="image/jpeg,image/png,image/jpg,image/webp"
                       @change="previews = Array.from($event.target.files).map(f => URL.createObjectURL(f)); removeImage = false"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                <p class="text-xs text-[#94a3b8] mt-1.5">Format: PNG, JPG, WEBP. Maks 2MB per gambar.</p>
                <!-- Preview new upload -->
                <div x-show="previews.length" class="mt-3 flex gap-3 flex-wrap">
                    <template x-for="(src, i) in previews" :key="i">
                        <div class="relative inline-block">
                            <img :src="src" class="h-28 w-44 rounded-xl shadow-sm border border-gray-100 object-cover">
                            <button @click="previews = previews.filter((_, idx) => idx !== i)" type="button"
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                        </div>
                    </template>
                </div>
                <!-- Existing image (edit mode) -->
                @if($heroSection->image)
                <div x-show="!previews.length && !removeImage" class="mt-3 relative inline-block">
                    <img src="{{ asset($heroSection->image) }}" class="h-28 w-44 rounded-xl shadow-sm border border-gray-100 object-cover">
                    <label class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs cursor-pointer hover:bg-red-600 transition-colors shadow-sm">
                        <input type="checkbox" name="remove_image" value="1" @change="removeImage = $event.target.checked" class="hidden">
                        &times;
                    </label>
                </div>
                <div x-show="removeImage && !previews.length" class="mt-3 text-sm text-red-500 italic">Gambar akan dihapus saat disimpan.</div>
                @endif
                <p class="text-xs text-[#94a3b8] mt-2">Tips: Saat membuat slide baru, upload beberapa gambar untuk membuat beberapa slide sekaligus. Setiap gambar akan menjadi slide terpisah dengan judul dan teks yang sama.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $heroSection->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Status</label>
                    <select name="is_active" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                        <option value="1" {{ old('is_active', $heroSection->is_active ?? true) ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !old('is_active', $heroSection->is_active ?? true) ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">{{ $heroSection->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ route('admin.hero-sections.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection