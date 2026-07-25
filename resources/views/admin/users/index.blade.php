@extends('admin.layouts.app')
@section('title', 'Manajemen Admin')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-[#64748b]">Kelola user yang memiliki akses ke panel admin.</p>
    <a href="{{ route('admin.users.create') }}" class="bg-[#0a192f] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">+ Tambah Admin</a>
</div>
@if(session('error'))
<div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">{{ session('error') }}</div>
@endif
<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
    @if($users->count())
    <table class="w-full">
        <thead><tr class="border-b border-gray-100 text-left text-sm font-semibold text-[#64748b]">
            <th class="px-6 py-4">Nama</th><th class="px-6 py-4">Email</th><th class="px-6 py-4">Role</th><th class="px-6 py-4">Tanggal Daftar</th><th class="px-6 py-4"></th>
        </tr></thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($users as $u)
        <tr class="text-sm text-[#1a1a2e]">
            <td class="px-6 py-4 font-medium">{{ $u->name }} @if($u->id === auth()->id())<span class="text-blue-500 text-xs ml-1">(Anda)</span>@endif</td>
            <td class="px-6 py-4">{{ $u->email }}</td>
            <td class="px-6 py-4">{!! $u->is_admin ? '<span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full">Admin</span>' : '<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">User</span>' !!}</td>
            <td class="px-6 py-4 text-[#64748b]">{{ $u->created_at->format('d M Y') }}</td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.users.edit', $u) }}" class="text-blue-600 hover:underline text-xs">Edit</a>
                @if($u->id !== auth()->id())
                <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="inline" onsubmit="return confirm('Hapus user ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs ml-3">Hapus</button></form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="p-8 text-center text-[#64748b]">Belum ada user.</div>
    @endif
</div>
@endsection
