@extends('admin.layouts.app')
@section('title', 'CTA')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'CTA']]" />
<x-admin.section-title title="CTA" subtitle="Blok ajakan bertindak">
    <x-slot:actions><x-admin.add-button route="admin.cta-sections.create" label="Tambah" /></x-slot:actions>
</x-admin.section-title>
<x-admin.table>
    <x-slot:head>
        <x-admin.th>Judul</x-admin.th>
        <x-admin.th>Tombol</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($sections as $s)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="font-medium">{{ $s->title }}</x-admin.td>
        <x-admin.td class="text-gray-500">{{ $s->button_text ?: '-' }}</x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="cta_sections" :id="$s->id" :checked="$s->is_active" /></x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.cta-sections.edit" destroy="admin.cta-sections.destroy" :params="[$s]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="4" message="Belum ada data." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $sections->firstItem() ?? 0 }} sampai {{ $sections->lastItem() ?? 0 }} dari {{ $sections->total() }} data</p>
        {{ $sections->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
