@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('content')
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
    @if($messages->count())
    <table class="w-full">
        <thead><tr class="border-b border-gray-100 text-left text-sm font-semibold text-[#64748b]">
            <th class="px-6 py-4">Nama</th><th class="px-6 py-4">Email</th><th class="px-6 py-4">Subjek</th><th class="px-6 py-4">Status</th><th class="px-6 py-4">Tanggal</th><th class="px-6 py-4"></th>
        </tr></thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($messages as $m)
        <tr class="text-sm text-[#1a1a2e] {{ !$m->is_read ? 'bg-blue-50/50 font-medium' : '' }}">
            <td class="px-6 py-4">{{ $m->name }}</td>
            <td class="px-6 py-4">{{ $m->email }}</td>
            <td class="px-6 py-4">{{ $m->subject ?: '-' }}</td>
            <td class="px-6 py-4">{!! $m->is_read ? '<span class="text-green-600 text-xs">Terbaca</span>' : '<span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full">Baru</span>' !!}</td>
            <td class="px-6 py-4 text-[#64748b]">{{ $m->created_at->diffForHumans() }}</td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.messages.show', $m) }}" class="text-blue-600 hover:underline text-xs">Lihat</a>
                <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs ml-3">Hapus</button></form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="p-8 text-center text-[#64748b]">Belum ada pesan masuk.</div>
    @endif
</div>
@endsection
