@extends('admin.layouts.app')
@section('title', 'Klien')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Klien']]" />
<x-admin.section-title title="Klien" subtitle="Logo klien untuk halaman utama">
    <x-slot:actions><x-admin.add-button route="admin.clients.create" label="Tambah Klien" /></x-slot:actions>
</x-admin.section-title>
<x-admin.search route="admin.clients.index" placeholder="Cari klien..." />
<x-admin.table>
    <x-slot:head>
        <x-admin.th>Nama</x-admin.th>
        <x-admin.th class="w-24">Logo</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($clients as $c)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="font-medium">{{ $c->name }}</x-admin.td>
        <x-admin.td>
            @if($c->logo)
            <img src="{{ asset($c->logo) }}" class="h-8 object-contain">
            @else
            <span class="text-gray-400">-</span>
            @endif
        </x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="clients" :id="$c->id" :checked="$c->status" /></x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.clients.edit" destroy="admin.clients.destroy" :params="[$c]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="4" message="Belum ada klien." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $clients->firstItem() ?? 0 }} sampai {{ $clients->lastItem() ?? 0 }} dari {{ $clients->total() }} data</p>
        {{ $clients->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
