@extends('admin.layouts.app')
@section('title', 'Proyek')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-[#64748b]">Kelola portofolio proyek.</p>
    <a href="{{ route('admin.projects.create') }}" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">+ Tambah Proyek</a>
</div>
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
    @if($projects->count())
    <table class="w-full">
        <thead><tr class="border-b border-gray-100 text-left text-sm font-semibold text-[#64748b]">
            <th class="px-6 py-4">Judul</th><th class="px-6 py-4">Kategori</th><th class="px-6 py-4">Status</th><th class="px-6 py-4"></th>
        </tr></thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($projects as $p)
        <tr class="text-sm text-[#1a1a2e]">
            <td class="px-6 py-4 font-medium">{{ $p->name }}</td>
            <td class="px-6 py-4">{{ $p->category?->name ?? '-' }}</td>
            <td class="px-6 py-4">
                @if($p->status)<span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full">Aktif</span>
                @else<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">Nonaktif</span>@endif
                @if($p->is_featured)<span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full ml-1">Unggulan</span>@endif
            </td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.projects.edit', $p) }}" class="text-blue-600 hover:underline text-xs">Edit</a>
                <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus proyek ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs ml-3">Hapus</button></form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="p-8 text-center text-[#64748b]">Belum ada proyek.</div>
    @endif
</div>
@endsection
