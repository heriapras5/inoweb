@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-2">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ $stats['projects'] }}</div>
        <div class="text-sm text-[#64748b]">Total Proyek</div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-2">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ $stats['services'] }}</div>
        <div class="text-sm text-[#64748b]">Total Layanan</div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-2">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ $stats['faqs'] }}</div>
        <div class="text-sm text-[#64748b]">Total FAQ</div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-2">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            @if($stats['unread_messages'] > 0)
            <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $stats['unread_messages'] }} baru</span>
            @endif
        </div>
        <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ $stats['messages'] }}</div>
        <div class="text-sm text-[#64748b]">Total Pesan</div>
    </div>
</div>

<div class="bg-white rounded-2xl p-8 border border-gray-200">
    <h2 class="text-lg font-bold text-[#1a1a2e] mb-4">Selamat Datang di Admin Panel INOWEB</h2>
    <p class="text-[#64748b] leading-relaxed">Gunakan menu di samping untuk mengelola konten website. Semua perubahan akan langsung terlihat di halaman publik.</p>
</div>
@endsection
