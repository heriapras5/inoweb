@extends('admin.layouts.app')
@section('title', $user->exists ? 'Edit Admin' : 'Tambah Admin')
@section('content')
<div class="max-w-xl">
    <form action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-8 space-y-6">
        @csrf @if($user->exists) @method('PUT') @endif
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Password{{ $user->exists ? ' (kosongkan jika tidak diubah)' : '' }}</label>
                <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" {{ $user->exists ? '' : 'required' }}>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" {{ $user->exists ? '' : 'required' }}>
            </div>
        </div>
        <div class="flex items-center gap-2 text-sm text-[#1a1a2e]">
            <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <label>Akses Admin</label>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#0a192f] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">{{ $user->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-300 hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
