@extends('admin.layouts.app')
@section('title', 'Proyek')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Proyek</span>
</nav>
<div x-data="{ search: '{{ request('search') }}' }">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-lg font-bold text-[#1e293b]">Daftar Projek</h2>
                <p class="text-sm text-[#64748b] mt-0.5">Kelola semua projek/portofolio website Anda.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-1.5 bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Proyek
            </a>
        </div>
        <form method="GET" action="{{ route('admin.projects.index') }}" class="px-6 py-4 border-b border-gray-100">
            <div class="flex gap-2 flex-wrap items-center">
                <div class="relative flex-1 min-w-[200px] max-w-md">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" name="search" x-model="search" placeholder="Cari projek..."
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                </div>
                <select name="category_id" class="w-44 px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors shrink-0">Cari</button>
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors shrink-0 text-[#64748b]">Reset</a>
            </div>
        </form>
        @if($projects->count())
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead><tr class="bg-gray-50/80 text-left text-xs font-semibold text-[#64748b] uppercase tracking-wider">
                    <th class="px-6 py-4 w-10">No</th>
                    <th class="px-6 py-4 w-14">Gambar</th>
                    <th class="px-6 py-4">Judul Projek</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4 w-28"></th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($projects as $index => $p)
                <tr class="text-sm text-[#1e293b] hover:bg-blue-50/30 transition-colors duration-150">
                    <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $projects->firstItem() + $index }}</td>
                    <td class="px-6 py-4">
                        @if($p->coverImage())
                        <img src="{{ asset($p->coverImage()->image) }}" class="w-14 h-10 object-cover rounded-lg shadow-sm border border-gray-100">
                        @else
                        <div class="w-14 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-[#94a3b8]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $p->name }}</td>
                    <td class="px-6 py-4">
                        @if($p->category)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold tracking-wide"
                              style="background: {{ match($p->category->slug) { 'company' => '#eff6ff', 'catalog' => '#fefce8', 'umkm' => '#f0fdf4', 'sistem' => '#faf5ff', 'landing' => '#fff1f2', 'custom' => '#fff7ed', default => '#f1f5f9' } }}; color: {{ match($p->category->slug) { 'company' => '#1d4ed8', 'catalog' => '#a16207', 'umkm' => '#15803d', 'sistem' => '#7e22ce', 'landing' => '#e11d48', 'custom' => '#ea580c', default => '#475569' } }};">
                            {{ $p->category->name }}
                        </span>
                        @else
                        <span class="text-[#94a3b8]">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-1">
                            <a href="{{ route('admin.projects.edit', $p) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </a>
                            <a href="{{ url('/portfolio/' . $p->slug) }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-[#64748b] hover:bg-gray-100 transition-colors" title="Lihat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                             <button type="button" @click="$parent.deleteTarget = '{{ route('admin.projects.destroy', $p) }}'; $parent.showDeleteModal = true" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 transition-colors" title="Hapus">
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
            <p class="text-xs text-[#64748b]">Menampilkan {{ $projects->firstItem() ?? 0 }} sampai {{ $projects->lastItem() ?? 0 }} dari {{ $projects->total() }} data</p>
            {{ $projects->appends(['search' => request('search'), 'category_id' => request('category_id')])->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <svg class="mx-auto text-[#cbd5e1] mb-4" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            <p class="text-sm text-[#94a3b8]">Belum ada proyek.</p>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-1 text-blue-600 text-sm mt-2 hover:underline">Tambah proyek pertama</a>
        </div>
        @endif
    </div>
</div>
@endsection