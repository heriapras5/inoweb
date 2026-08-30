@extends('admin.layouts.app')
@section('title', 'Layanan')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Layanan</span>
</nav>
<div x-data="{ search: '{{ request('search') }}' }">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-lg font-bold text-[#1e293b]">Daftar Layanan</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Kelola layanan yang ditampilkan di halaman utama.</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-1.5 bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Layanan
            </a>
        </div>
        <form method="GET" action="{{ route('admin.services.index') }}" class="px-6 py-4 border-b border-gray-100">
            <div class="flex gap-2 max-w-md">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" name="search" x-model="search" placeholder="Cari layanan..."
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <button type="submit" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors shrink-0">Cari</button>
            </div>
        </form>
        @if($services->count())
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead><tr class="bg-gray-50/80 text-left text-xs font-semibold text-[#64748b] uppercase tracking-wider">
                    <th class="px-6 py-4 w-10">No</th>
                    <th class="px-6 py-4 w-12">Ikon</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4 w-24">Fitur</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 w-16">Urutan</th>
                    <th class="px-6 py-4 w-28">Dibuat Pada</th>
                    <th class="px-6 py-4 w-24"></th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($services as $index => $s)
                <tr class="text-sm text-[#1e293b] hover:bg-blue-50/30 transition-colors duration-150">
                    <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $services->firstItem() + $index }}</td>
                    <td class="px-6 py-4">
                        <div class="w-10 h-10 bg-blue-600/10 rounded-xl flex items-center justify-center text-blue-600">{!! $s->icon !!}</div>
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $s->title }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 text-xs font-medium text-[#64748b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            {{ is_array($s->features) ? count($s->features) : 0 }} fitur
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium">
                            <span class="w-2 h-2 rounded-full {{ $s->status ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            {{ $s->status ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-[#64748b] text-xs">{{ $s->sort_order ?? 0 }}</td>
                    <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $s->created_at->format('d M Y') }}<br>{{ $s->created_at->format('H:i') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-1">
                            <a href="{{ route('admin.services.edit', $s) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </a>
<form method="POST" action="{{ route('admin.services.destroy', $s) }}" class="inline" id="delete-{{ $s->id }}">
                                 @csrf @method('DELETE')
                                 <button type="button" @click="Swal.fire({title:'Konfirmasi Hapus',text:'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.',icon:'question',showCancelButton:true,confirmButtonText:'Ya, Hapus',cancelButtonText:'Batal',confirmButtonColor:'#ef4444',cancelButtonColor:'#e2e8f0',reverseButtons:true}).then(r=>{ if(r.isConfirmed) document.getElementById('delete-{{ $s->id }}').submit(); })" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 transition-colors" title="Hapus">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                 </button>
                             </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-xs text-[#64748b]">Menampilkan {{ $services->firstItem() ?? 0 }} sampai {{ $services->lastItem() ?? 0 }} dari {{ $services->total() }} data</p>
            {{ $services->appends(['search' => request('search')])->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <svg class="mx-auto text-[#cbd5e1] mb-4" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            <p class="text-sm text-[#94a3b8]">Belum ada layanan.</p>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-1 text-blue-600 text-sm mt-2 hover:underline">Tambah layanan pertama</a>
        </div>
        @endif
    </div>
</div>
@endsection
