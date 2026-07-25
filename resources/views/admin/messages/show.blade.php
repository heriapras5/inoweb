@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-8 space-y-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-[#64748b]">Nama</span><p class="font-medium text-[#1a1a2e]">{{ $message->name }}</p></div>
            <div><span class="text-[#64748b]">Email</span><p class="font-medium text-[#1a1a2e]">{{ $message->email }}</p></div>
            @if($message->phone)<div><span class="text-[#64748b]">Telepon</span><p class="font-medium text-[#1a1a2e]">{{ $message->phone }}</p></div>@endif
            @if($message->subject)<div><span class="text-[#64748b]">Subjek</span><p class="font-medium text-[#1a1a2e]">{{ $message->subject }}</p></div>@endif
            <div><span class="text-[#64748b]">Diterima</span><p class="font-medium text-[#1a1a2e]">{{ $message->created_at->format('d M Y H:i') }}</p></div>
        </div>
        <hr class="border-gray-100">
        <div>
            <span class="text-sm text-[#64748b]">Pesan</span>
            <p class="mt-2 text-[#1a1a2e] leading-relaxed">{{ $message->message }}</p>
        </div>
        <div class="flex gap-3 pt-2">
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-sm">Hapus</button></form>
            <a href="{{ route('admin.messages.index') }}" class="text-[#64748b] hover:underline text-sm">Kembali</a>
        </div>
    </div>
</div>
@endsection
