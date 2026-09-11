@extends('admin.layouts.app')
@section('title', 'Partner')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Partner']]" />
<x-admin.section-title title="Partner" subtitle="Logo partner kerja sama">
    <x-slot:actions><x-admin.add-button route="admin.partners.create" label="Tambah Partner" /></x-slot:actions>
</x-admin.section-title>
<x-admin.search route="admin.partners.index" placeholder="Cari partner..." />
<x-admin.table>
    <x-slot:head>
        <x-admin.th>Nama</x-admin.th>
        <x-admin.th class="w-24">Logo</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($partners as $p)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="font-medium">{{ $p->name }}</x-admin.td>
        <x-admin.td>
            @if($p->logo)
            <img src="{{ asset($p->logo) }}" class="h-8 object-contain">
            @else
            <span class="text-gray-400">-</span>
            @endif
        </x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="partners" :id="$p->id" :checked="$p->status" /></x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.partners.edit" destroy="admin.partners.destroy" :params="[$p]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="4" message="Belum ada partner." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $partners->firstItem() ?? 0 }} sampai {{ $partners->lastItem() ?? 0 }} dari {{ $partners->total() }} data</p>
        {{ $partners->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
