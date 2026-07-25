@extends('admin.layouts.app')
@section('title', $project->exists ? 'Edit Proyek' : 'Tambah Proyek')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @if($project->exists) @method('PUT') @endif
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Judul Proyek</label>
                <input type="text" name="name" value="{{ old('name', $project->name) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Slug (biarkan kosong untuk otomatis)</label>
                <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Deskripsi</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Kategori</label>
                <select name="category_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    <option value="">-- Pilih --</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ old('category_id', $project->category_id) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Klien</label>
                <input type="text" name="client" value="{{ old('client', $project->client) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">URL</label>
                <input type="text" name="url" value="{{ old('url', $project->url) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Tahun</label>
                <input type="text" name="year" value="{{ old('year', $project->year) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div class="flex gap-6">
            <label class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                <input type="checkbox" name="status" value="1" {{ old('status', $project->status ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                Aktif
            </label>
            <label class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                Proyek Unggulan
            </label>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">{{ $project->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-300 hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
