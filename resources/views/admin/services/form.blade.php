@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Layanan' : 'Tambah Layanan')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @if($service->exists) @method('PUT') @endif
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Judul Layanan</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Ikon (Heroicons atau teks)</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
            <div class="flex items-end pb-2.5">
                <label class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                    <input type="checkbox" name="status" value="1" {{ old('status', $service->status ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Aktif
                </label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">{{ $service->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-300 hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
