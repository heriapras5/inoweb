@extends('admin.layouts.app')
@section('title', 'Traffic')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Traffic']]" />
<x-admin.section-title title="Traffic Pengunjung" subtitle="Log kunjungan read-only, hanya bisa hapus" />
<x-admin.search route="admin.traffics.index" placeholder="Cari URL atau IP..." />
<x-admin.table>
    <x-slot:head>
        <x-admin.th class="w-28">Waktu</x-admin.th>
        <x-admin.th>Halaman</x-admin.th>
        <x-admin.th class="w-32">IP</x-admin.th>
        <x-admin.th class="w-24">Device</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($traffics as $t)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="text-gray-500 text-xs">{{ $t->created_at->format('d M Y H:i') }}</x-admin.td>
        <x-admin.td>{{ \Illuminate\Support\Str::limit($t->page_url, 70) }}</x-admin.td>
        <x-admin.td class="text-gray-500 font-mono text-xs">{{ $t->ip_address }}</x-admin.td>
        <x-admin.td class="text-gray-500">{{ $t->device_type ?? '-' }}</x-admin.td>
        <x-admin.td><x-admin.actions :destroy="'admin.traffics.destroy'" :params="[$t->id]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="5" message="Belum ada data traffic." />
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $traffics->firstItem() ?? 0 }} sampai {{ $traffics->lastItem() ?? 0 }} dari {{ $traffics->total() }} data</p>
        {{ $traffics->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
