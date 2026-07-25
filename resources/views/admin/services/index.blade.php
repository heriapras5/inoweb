@extends('admin.layouts.app')
@section('title', 'Layanan')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-[#64748b]">Kelola layanan yang ditampilkan di halaman utama.</p>
    <a href="{{ route('admin.services.create') }}" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">+ Tambah Layanan</a>
</div>
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
    @if($services->count())
    <table class="w-full">
        <thead><tr class="border-b border-gray-100 text-left text-sm font-semibold text-[#64748b]">
            <th class="px-6 py-4">Urutan</th><th class="px-6 py-4">Ikon</th><th class="px-6 py-4">Judul</th><th class="px-6 py-4">Status</th><th class="px-6 py-4"></th>
        </tr></thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($services as $s)
        <tr class="text-sm text-[#1a1a2e]">
            <td class="px-6 py-4">{{ $s->sort_order }}</td>
            <td class="px-6 py-4 font-mono text-xs">{{ $s->icon }}</td>
            <td class="px-6 py-4 font-medium">{{ $s->title }}</td>
            <td class="px-6 py-4">{!! $s->status ? '<span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full">Aktif</span>' : '<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">Nonaktif</span>' !!}</td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.services.edit', $s) }}" class="text-blue-600 hover:underline text-xs">Edit</a>
                <form action="{{ route('admin.services.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Hapus layanan ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs ml-3">Hapus</button></form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="p-8 text-center text-[#64748b]">Belum ada layanan.</div>
    @endif
</div>
@endsection
