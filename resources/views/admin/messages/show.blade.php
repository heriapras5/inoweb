@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('content')
<nav class="flex items-center gap-1.5 text-xs text-[#94a3b8] mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <a href="{{ route('admin.messages.index') }}" class="hover:text-blue-600 transition-colors">Pesan Masuk</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
    <span class="text-[#475569]">Detail</span>
</nav>
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm">
        <div class="px-8 py-5 border-b border-gray-100">
            <h2 class="text-lg font-bold text-[#1e293b]">Detail Pesan</h2>
        </div>
        <div class="p-8">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-md">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-[#1a1a2e]">{{ $message->name }}</h3>
                    <p class="text-sm text-[#64748b]">{{ $message->email }}</p>
                </div>
                <span class="text-xs text-[#94a3b8] whitespace-nowrap">{{ $message->created_at->format('d M Y H:i') }}</span>
            </div>
            @if($message->phone)
            <div class="mb-5 p-4 bg-gray-50 rounded-xl">
                <span class="text-xs text-[#64748b] font-medium uppercase tracking-wider">No. Telepon</span>
                <p class="text-sm text-[#1a1a2e] font-medium mt-0.5">{{ $message->phone }}</p>
            </div>
            @endif
            @if($message->subject)
            <div class="mb-5">
                <span class="text-xs text-[#64748b] font-medium uppercase tracking-wider">Subjek</span>
                <p class="text-sm text-[#1a1a2e] font-medium mt-0.5">{{ $message->subject }}</p>
            </div>
            @endif
            <div class="mb-8">
                <span class="text-xs text-[#64748b] font-medium uppercase tracking-wider">Pesan</span>
                <div class="mt-2 p-5 bg-gray-50 rounded-xl">
                    <p class="text-sm text-[#475569] leading-relaxed whitespace-pre-wrap">{{ $message->message }}</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-100">
                <a href="mailto:{{ $message->email }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Balas Email
                </a>
                <a href="https://wa.me/{{ $message->phone ?: setting('whatsapp_number', '6281234567890') }}" target="_blank" class="border border-gray-200 text-[#1a1a2e] px-5 py-2.5 rounded-xl text-sm font-medium hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all inline-flex items-center gap-2">
                    Chat WhatsApp
                </a>
                <a href="{{ route('admin.messages.index') }}" class="px-5 py-2.5 rounded-xl text-sm border border-gray-200 hover:border-gray-300 hover:bg-gray-50 shadow-sm transition-all">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection