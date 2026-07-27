@extends('admin.layouts.app')
@section('title', $user->exists ? 'Edit Admin' : 'Tambah Admin')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.users.index') }}" class="hover:text-blue-600 transition-colors">Admin</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">{{ $user->exists ? 'Edit' : 'Tambah' }}</span>
</nav>
<div class="max-w-xl">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-8 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">{{ $user->exists ? 'Edit Admin' : 'Tambah Admin' }}</h2>
            <p class="text-sm text-[#64748b] mt-0.5">{{ $user->exists ? 'Ubah data admin.' : 'Buat akun admin baru.' }}</p>
        </div>
        <form action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
            @csrf @if($user->exists) @method('PUT') @endif
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Password{{ $user->exists ? ' (kosongkan jika tidak diubah)' : '' }}</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" {{ $user->exists ? '' : 'required' }}>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-shadow" {{ $user->exists ? '' : 'required' }}>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm text-[#1a1a2e]">
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} {{ $user->id === 1 ? 'disabled' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 {{ $user->id === 1 ? 'opacity-60 cursor-not-allowed' : '' }}">
                <label>{{ $user->id === 1 ? 'Akses Admin (Super Admin - tidak dapat diubah)' : 'Akses Admin' }}</label>
            </div>
            @if($user->id === 1)
            <input type="hidden" name="is_admin" value="1">
            @endif
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-gradient-to-r from-[#0a192f] to-[#1a365d] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:from-[#0f2a4a] hover:to-[#1e4978] shadow-md hover:shadow-lg transition-all">{{ $user->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection