@extends('admin.layouts.app')
@section('title', $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @if($testimonial->exists) @method('PUT') @endif
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Nama</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Avatar (URL)</label>
                <input type="text" name="avatar" value="{{ old('avatar', $testimonial->avatar) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Role / Jabatan</label>
                <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Testimoni</label>
            <textarea name="quote" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>{{ old('quote', $testimonial->quote) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Rating (1-5)</label>
                <select name="rating" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    <option value="">--</option>@for($i=1;$i<=5;$i++)<option value="{{$i}}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{$i}} ★</option>@endfor
                </select>
            </div>
            <div class="flex items-end pb-2.5">
                <label class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                    <input type="checkbox" name="status" value="1" {{ old('status', $testimonial->status ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Aktif
                </label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">{{ $testimonial->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-300 hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
