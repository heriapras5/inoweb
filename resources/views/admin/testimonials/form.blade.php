@extends('admin.layouts.app')
@section('title', $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.testimonials.index') }}" class="hover:text-blue-600 transition-colors">Testimoni</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">{{ $testimonial->exists ? 'Edit' : 'Tambah' }}</span>
</nav>
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-8 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">{{ $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni' }}</h2>
            <p class="text-sm text-[#64748b] mt-0.5">{{ $testimonial->exists ? 'Ubah data testimoni.' : 'Buat testimoni baru.' }}</p>
        </div>
        <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf @if($testimonial->exists) @method('PUT') @endif
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow {{ $errors->has('name') ? 'border-red-300 bg-red-50' : '' }}" required>
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Role / Jabatan</label>
                    <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
            </div>
            <div x-data="{ preview: null, existingAvatar: @json($testimonial->avatar ? (str_starts_with($testimonial->avatar, 'http') ? $testimonial->avatar : asset($testimonial->avatar)) : null) }">
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Foto Profil (Avatar)</label>
                <p class="text-xs text-[#94a3b8] mb-2">Upload gambar JPG, PNG, atau WebP maksimal 2MB. Disarankan 1:1.</p>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                        <template x-if="preview">
                            <img :src="preview" class="w-full h-full object-cover" alt="Preview">
                        </template>
                        <template x-if="!preview && existingAvatar">
                            <img :src="existingAvatar" class="w-full h-full object-cover" alt="Avatar">
                        </template>
                        <template x-if="!preview && !existingAvatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" class="opacity-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </template>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" accept="image/jpeg,image/png,image/jpg,image/webp"
                               @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null"
                               class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:text-sm file:font-medium hover:file:bg-blue-100">
                        @error('avatar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        @if($testimonial->exists && $testimonial->avatar)
                        <label class="inline-flex items-center gap-2 mt-2 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_avatar" value="1">
                            Hapus foto profil saat ini
                        </label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Testimoni</label>
                <textarea name="quote" class="summernote">{{ old('quote', $testimonial->quote) }}</textarea>
                @error('quote')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Rating (1-5)</label>
                    <select name="rating" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                        <option value="">--</option>@for($i=1;$i<=5;$i++)<option value="{{$i}}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{$i}} ★</option>@endfor
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Status</label>
                    <select name="status" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                        <option value="1" {{ old('status', $testimonial->status ?? true) ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !old('status', $testimonial->status ?? true) ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">{{ $testimonial->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection