@extends('admin.layouts.app')
@section('title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')
@section('content')
<div class="max-w-2xl">
    <form action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @if($faq->exists) @method('PUT') @endif
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Pertanyaan</label>
            <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Jawaban</label>
            <textarea name="answer" rows="5" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
            <div class="flex items-end pb-2.5">
                <label class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                    <input type="checkbox" name="status" value="1" {{ old('status', $faq->status ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Aktif
                </label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">{{ $faq->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('admin.faqs.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-300 hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
