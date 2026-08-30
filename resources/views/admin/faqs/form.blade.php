@extends('admin.layouts.app')
@section('title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.faqs.index') }}" class="hover:text-blue-600 transition-colors">FAQ</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">{{ $faq->exists ? 'Edit' : 'Tambah' }}</span>
</nav>
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-8 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">{{ $faq->exists ? 'Edit FAQ' : 'Tambah FAQ' }}</h2>
            <p class="text-sm text-[#64748b] mt-0.5">{{ $faq->exists ? 'Ubah data FAQ.' : 'Buat FAQ baru.' }}</p>
        </div>
        <form action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST" class="p-8 space-y-6">
            @csrf @if($faq->exists) @method('PUT') @endif
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Pertanyaan</label>
                <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow {{ $errors->has('question') ? 'border-red-300 bg-red-50' : '' }}" required>
                @error('question')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Jawaban</label>
                <textarea name="answer" class="summernote">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Status</label>
                    <select name="status" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                        <option value="1" {{ old('status', $faq->status ?? true) ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !old('status', $faq->status ?? true) ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">{{ $faq->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ route('admin.faqs.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection