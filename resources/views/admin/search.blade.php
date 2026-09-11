@extends('admin.layouts.app')
@section('title', 'Pencarian')
@section('content')
<nav class="text-xs text-gray-400 mb-4"><a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a> / Pencarian</nav>
<div class="bg-white rounded-2xl border shadow-sm">
<div class="px-6 py-5 border-b"><h2 class="text-lg font-bold">Hasil pencarian: "{{ $q }}"</h2></div>
<div class="p-6 space-y-6">
@if($q === '')
<p class="text-sm text-gray-400">Ketik kata kunci pada kolom pencarian di header.</p>
@else
@forelse($results as $group => $items)
<div><h3 class="text-sm font-bold uppercase tracking-wide text-gray-500 mb-2">{{ $group }} ({{ $items->count() }})</h3>
@if($items->count())
<ul class="divide-y border rounded-xl">
@foreach($items as $it)
<li class="px-4 py-2.5 text-sm">{{ $it->title ?? $it->name ?? $it->question ?? $it->subject ?? $it->email ?? ('#' . $it->id) }}</li>
@endforeach
</ul>
@else<p class="text-sm text-gray-400">Tidak ada hasil.</p>@endif
</div>
@empty
<p class="text-sm text-gray-400">Tidak ada hasil.</p>
@endforelse
@endif
</div>
</div>
@endsection
