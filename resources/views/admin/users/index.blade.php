@extends('admin.layouts.app')
@section('title', 'Manajemen Admin')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Manajemen Admin</span>
</nav>
<div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
    <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-lg font-bold text-[#1e293b]">Manajemen Admin</h2>
            <p class="text-sm text-[#64748b] mt-0.5">Kelola akun admin.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-1.5 bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Admin
        </a>
    </div>
    @if($users->count())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead><tr class="bg-gray-50/80 text-left text-xs font-semibold text-[#64748b] uppercase tracking-wider">
                <th class="px-6 py-4 w-10">No</th>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4 w-20">Role</th>
                <th class="px-6 py-4 w-28">Bergabung</th>
                <th class="px-6 py-4 w-24"></th>
            </tr></thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($users as $index => $u)
            <tr class="text-sm text-[#1e293b] hover:bg-blue-50/30 transition-colors duration-150">
                <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $loop->iteration ?? $index + 1 }}</td>
                <td class="px-6 py-4 font-medium">{{ $u->name }}</td>
                <td class="px-6 py-4 text-[#64748b]">{{ $u->email }}</td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold tracking-wide {{ $u->id === 1 ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $u->id === 1 ? 'bg-amber-500' : 'bg-blue-500' }}"></span>
                        {{ $u->id === 1 ? 'Super Admin' : ($u->is_admin ? 'Admin' : 'User') }}
                    </span>
                </td>
                <td class="px-6 py-4 text-[#94a3b8] text-xs">{{ $u->created_at->format('d M Y') }}<br>{{ $u->created_at->format('H:i') }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-1">
                        <a href="{{ route('admin.users.edit', $u) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </a>
                        @if($u->is_admin && $u->id !== 1 && $u->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $u) }}" class="inline" id="delete-{{ $u->id }}">
                            @csrf @method('DELETE')
                            <button type="button" @click="Swal.fire({title:'Konfirmasi Hapus',text:'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.',icon:'question',showCancelButton:true,confirmButtonText:'Ya, Hapus',cancelButtonText:'Batal',confirmButtonColor:'#ef4444',cancelButtonColor:'#e2e8f0',reverseButtons:true}).then(r=>{ if(r.isConfirmed) document.getElementById('delete-{{ $u->id }}').submit(); })" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 transition-colors" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </form>
                        @else
                        <span class="text-[#94a3b8] text-xs">{{ $u->id === 1 ? 'Super Admin' : ($u->id === auth()->id() ? 'Akun sendiri' : '-') }}</span>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="p-12 text-center">
        <svg class="mx-auto text-[#cbd5e1] mb-4" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        <p class="text-sm text-[#94a3b8]">Belum ada admin.</p>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-1 text-blue-600 text-sm mt-2 hover:underline">Tambah admin pertama</a>
    </div>
    @endif
</div>
@endsection
