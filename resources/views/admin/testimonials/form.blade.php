@extends('admin.layouts.app')
@section('title', $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Testimoni', 'url' => route('admin.testimonials.index')], ['label' => $testimonial->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-2xl">
    <x-admin.form-card :title="$testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni'" :description="$testimonial->exists ? 'Ubah data testimoni.' : 'Buat testimoni baru.'">
        <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @if($testimonial->exists) @method('PUT') @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-admin.input name="name" label="Nama" :value="$testimonial->name" required />
                <x-admin.input name="role" label="Role / Jabatan" :value="$testimonial->role" />
            </div>
            <div x-data="{ preview: null, existingAvatar: @json($testimonial->avatar ? (str_starts_with($testimonial->avatar, 'http') ? $testimonial->avatar : asset($testimonial->avatar)) : null) }">
                <label class="form-label">Foto Profil (Avatar)</label>
                <p class="form-hint mb-2">Upload gambar JPG, PNG, atau WebP maksimal 2MB. Disarankan 1:1.</p>
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full overflow-hidden bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                        <template x-if="preview">
                            <img :src="preview" class="w-full h-full object-cover" alt="Preview">
                        </template>
                        <template x-if="!preview && existingAvatar">
                            <img :src="existingAvatar" class="w-full h-full object-cover" alt="Avatar">
                        </template>
                        <template x-if="!preview && !existingAvatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" class="opacity-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </template>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" accept="image/jpeg,image/png,image/jpg,image/webp"
                               @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null"
                               class="admin-input file:mr-3 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:text-xs file:font-medium hover:file:bg-blue-100">
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
            <x-admin.summernote name="quote" label="Testimoni" :value="$testimonial->quote" :height="200" />
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-admin.select name="rating" label="Rating (1-5)" :options="['' => '--', '1' => '1 ★', '2' => '2 ★', '3' => '3 ★', '4' => '4 ★', '5' => '5 ★']" :selected="old('rating', (string) ($testimonial->rating ?? ''))" />
                <x-admin.input name="sort_order" label="Urutan" type="number" :value="$testimonial->sort_order ?? 0" />
                <x-admin.select name="status" label="Status" :options="['1' => 'Aktif', '0' => 'Nonaktif']" :selected="old('status', (string) ($testimonial->status ?? 1))" />
            </div>
            <x-admin.form-actions :cancelUrl="route('admin.testimonials.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
