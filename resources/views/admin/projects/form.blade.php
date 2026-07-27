@extends('admin.layouts.app')
@section('title', $project->exists ? 'Edit Proyek' : 'Tambah Proyek')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.projects.index') }}" class="hover:text-blue-600 transition-colors">Proyek</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">{{ $project->exists ? 'Edit' : 'Tambah' }}</span>
</nav>
<form action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf @if($project->exists) @method('PUT') @endif

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
            <div class="px-8 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-[#1e293b]">{{ $project->exists ? 'Edit Proyek' : 'Tambah Proyek' }}</h2>
                <p class="text-sm text-[#64748b] mt-0.5">{{ $project->exists ? 'Ubah data proyek.' : 'Buat proyek baru.' }}</p>
            </div>

            <div class="p-8 space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Judul Projek <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" required>
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Kategori</label>
                        <select name="category_id" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                            <option value="">-- Pilih --</option>
                            @foreach($categories as $c)
                            <option value="{{ $c->id }}" {{ old('category_id', $project->category_id) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="10" class="summernote">{{ old('description', $project->description) }}</textarea>
                    <p class="text-xs text-[#94a3b8] mt-1.5">Tulis deskripsi lengkap proyek termasuk fitur-fiturnya di sini. Mendukung teks, gambar, dan HTML.</p>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Gambar Utama (Cover) --}}
                <div x-data="{ mainPreview: null }">
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Gambar Utama <span class="text-xs text-[#94a3b8] font-normal">(cover/hero)</span></label>
                    <input type="file" name="main_image" accept="image/jpeg,image/png,image/jpg,image/webp"
                           @change="mainPreview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Format: PNG, JPG, WEBP. Maks 2MB. Gambar ini akan menjadi cover/hero projek.</p>
                    @error('main_image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    <div x-show="mainPreview" class="mt-3 relative inline-block">
                        <img :src="mainPreview" class="h-28 w-44 rounded-xl shadow-sm border border-gray-100 object-cover">
                        <button @click="mainPreview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm">&times;</button>
                    </div>
                    @php $_cover = $project->exists ? $project->images->firstWhere('type', 'cover') : null; @endphp
                    @if($_cover)
                    <div x-show="!mainPreview" class="mt-3 relative inline-block">
                        <img src="{{ asset($_cover->image) }}" class="h-28 w-44 rounded-xl shadow-sm border border-gray-100 object-cover">
                        <label class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs cursor-pointer hover:bg-red-600 transition-colors shadow-sm">
                            <input type="checkbox" name="deleted_images[]" value="{{ $_cover->id }}" class="hidden">
                            &times;
                        </label>
                    </div>
                    @endif
                </div>

                {{-- Gambar Thumbnail (Galeri) --}}
                <div x-data="{ galleryFiles: [], galleryPreviews: [] }">
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Gambar Thumbnail <span class="text-xs text-[#94a3b8] font-normal">(galeri tambahan)</span></label>
                    <input type="file" name="gallery_images[]" multiple accept="image/jpeg,image/png,image/jpg,image/webp"
                           x-ref="galleryInput"
                           @change="galleryFiles = Array.from($event.target.files); galleryPreviews = galleryFiles.map(f => URL.createObjectURL(f))"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <p class="text-xs text-[#94a3b8] mt-1.5">Upload beberapa gambar sekaligus. Gambar-gambar ini akan ditampilkan di galeri projek. Format: PNG, JPG, WEBP. Maks 2MB per gambar.</p>
                    @error('gallery_images.*')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    <div class="flex gap-3 mt-3 flex-wrap" x-show="galleryPreviews.length">
                        <template x-for="(src, i) in galleryPreviews" :key="i">
                            <div class="relative w-28 h-20 rounded-xl overflow-hidden border border-gray-200 shadow-sm group">
                                <img :src="src" class="w-full h-full object-cover">
                                <button @click="galleryFiles.splice(i, 1); galleryPreviews.splice(i, 1); const dt = new DataTransfer(); galleryFiles.forEach(f => dt.items.add(f)); $refs.galleryInput.files = dt.files" type="button"
                                        class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors shadow-sm opacity-0 group-hover:opacity-100">&times;</button>
                            </div>
                        </template>
                    </div>
                    @php $_gallery = $project->exists ? $project->images->where('type', 'gallery') : collect(); @endphp
                    @if($_gallery->count())
                    <div x-show="!galleryPreviews.length" class="mt-4">
                        <p class="text-xs font-medium text-[#64748b] mb-2">Gambar saat ini:</p>
                        <div class="flex gap-3 flex-wrap">
                            @foreach($_gallery as $img)
                            <div class="relative w-28 h-20 rounded-xl overflow-hidden border border-gray-200 shadow-sm group">
                                <img src="{{ asset($img->image) }}" class="w-full h-full object-cover">
                                <label class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                    <input type="checkbox" name="deleted_images[]" value="{{ $img->id }}" class="w-4 h-4 rounded border-white text-red-500 focus:ring-red-500">
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-xs text-[#94a3b8] mt-1.5">Centang gambar yang ingin dihapus, lalu simpan.</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="px-8 py-4 border-t border-gray-100 flex justify-between items-center">
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all text-[#64748b]">Batal</a>
                <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">
                    {{ $project->exists ? 'Simpan Perubahan' : 'Simpan' }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection