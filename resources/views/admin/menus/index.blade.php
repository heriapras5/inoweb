@extends('admin.layouts.app')
@section('title', 'Menu')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Menu']]" />
<x-admin.section-title title="Menu Navigasi" subtitle="Kelola menu website">
    <x-slot:actions><x-admin.add-button route="admin.menus.create" label="Tambah" /></x-slot:actions>
</x-admin.section-title>
<x-admin.table>
    <x-slot:head>
        <x-admin.th>Nama</x-admin.th>
        <x-admin.th>URL</x-admin.th>
        <x-admin.th>Induk</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($menus as $m)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="font-medium">{{ $m->name }}</x-admin.td>
        <x-admin.td class="text-gray-500 font-mono text-xs">{{ $m->url ?: '-' }}</x-admin.td>
        <x-admin.td class="text-gray-500">{{ $m->parent?->name ?? '-' }}</x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="menus" :id="$m->id" :checked="$m->status" /></x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.menus.edit" destroy="admin.menus.destroy" :params="[$m]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="5" message="Belum ada menu." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $menus->firstItem() ?? 0 }} sampai {{ $menus->lastItem() ?? 0 }} dari {{ $menus->total() }} data</p>
        {{ $menus->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
