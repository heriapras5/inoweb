@extends('admin.layouts.app')
@section('title', 'FAQ')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-[#64748b]">Kelola pertanyaan yang sering diajukan.</p>
    <a href="{{ route('admin.faqs.create') }}" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">+ Tambah FAQ</a>
</div>
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
    @if($faqs->count())
    <table class="w-full">
        <thead><tr class="border-b border-gray-100 text-left text-sm font-semibold text-[#64748b]">
            <th class="px-6 py-4">Urutan</th><th class="px-6 py-4">Pertanyaan</th><th class="px-6 py-4">Status</th><th class="px-6 py-4"></th>
        </tr></thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($faqs as $f)
        <tr class="text-sm text-[#1a1a2e]">
            <td class="px-6 py-4">{{ $f->sort_order }}</td>
            <td class="px-6 py-4 font-medium">{{ $f->question }}</td>
            <td class="px-6 py-4">{!! $f->status ? '<span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full">Aktif</span>' : '<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">Nonaktif</span>' !!}</td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.faqs.edit', $f) }}" class="text-blue-600 hover:underline text-xs">Edit</a>
                <form action="{{ route('admin.faqs.destroy', $f) }}" method="POST" class="inline" onsubmit="return confirm('Hapus FAQ ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs ml-3">Hapus</button></form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="p-8 text-center text-[#64748b]">Belum ada FAQ.</div>
    @endif
</div>
@endsection
