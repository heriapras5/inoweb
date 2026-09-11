@extends('admin.layouts.app')
@section('title', 'Info Kontak')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Info Kontak']]" />
<x-admin.section-title title="Info Kontak" subtitle="Alamat, telepon, email, jam operasional">
    <x-slot:actions><x-admin.add-button route="admin.contact-info.create" label="Tambah" /></x-slot:actions>
</x-admin.section-title>
<x-admin.table>
    <x-slot:head>
        <x-admin.th class="w-24">Tipe</x-admin.th>
        <x-admin.th>Label</x-admin.th>
        <x-admin.th>Nilai</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($items as $i)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td><x-admin.badge color="gray">{{ $i->type }}</x-admin.badge></x-admin.td>
        <x-admin.td class="font-medium">{{ $i->label }}</x-admin.td>
        <x-admin.td class="text-gray-500">{{ \Illuminate\Support\Str::limit($i->value, 60) }}</x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="contact_info" :id="$i->id" :checked="$i->status" /></x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.contact-info.edit" destroy="admin.contact-info.destroy" :params="[$i]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="5" message="Belum ada info kontak." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $items->firstItem() ?? 0 }} sampai {{ $items->lastItem() ?? 0 }} dari {{ $items->total() }} data</p>
        {{ $items->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
