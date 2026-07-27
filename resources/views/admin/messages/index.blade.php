@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Pesan Masuk</span>
</nav>
<div x-data="{ search: '{{ request('search') }}' }">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">Pesan Masuk</h2>
            <p class="text-sm text-[#64748b] mt-0.5">Pesan dari pengunjung website.</p>
        </div>
        <form method="GET" action="{{ route('admin.messages.index') }}" class="px-6 py-4 border-b border-gray-100">
            <div class="flex gap-2 max-w-md">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" name="search" x-model="search" placeholder="Cari pesan..."
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <button type="submit" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors shrink-0">Cari</button>
            </div>
        </form>
        @if($messages->count())
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead><tr class="bg-gray-50/80 text-left text-xs font-semibold text-[#64748b] uppercase tracking-wider">
                    <th class="px-6 py-4 w-10">No</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Subjek</th>
                    <th class="px-6 py-4 w-20">Status</th>
                    <th class="px-6 py-4 w-28">Tanggal</th>
                    <th class="px-6 py-4 w-24"></th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($messages as $index => $m)
                <tr class="text-sm text-[#1e293b] hover:bg-blue-50/30 transition-colors duration-150 {{ !$m->is_read ? 'bg-blue-50/40 font-medium' : '' }}">
                    <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $messages->firstItem() + $index }}</td>
                    <td class="px-6 py-4">{{ $m->name }}</td>
                    <td class="px-6 py-4 text-[#64748b]">{{ $m->email }}</td>
                    <td class="px-6 py-4">{{ $m->subject ? \Str::limit($m->subject, 30) : '-' }}</td>
                    <td class="px-6 py-4">
                        @if($m->is_read)
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-green-600">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            Terbaca
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-700 bg-blue-100 px-2.5 py-1 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            Baru
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $m->created_at->format('d M Y') }}<br>{{ $m->created_at->format('H:i') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-1">
                            <a href="{{ route('admin.messages.show', $m) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors" title="Lihat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                            <button type="button" @click="deleteTarget = '{{ route('admin.messages.destroy', $m) }}'; showDeleteModal = true" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 transition-colors" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-xs text-[#64748b]">Menampilkan {{ $messages->firstItem() ?? 0 }} sampai {{ $messages->lastItem() ?? 0 }} dari {{ $messages->total() }} data</p>
            {{ $messages->appends(['search' => request('search')])->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <svg class="mx-auto text-[#cbd5e1] mb-4" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/></svg>
            <p class="text-sm text-[#94a3b8]">Belum ada pesan masuk.</p>
        </div>
        @endif
    </div>
</div>
@endsection
