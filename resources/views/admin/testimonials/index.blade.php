@extends('admin.layouts.app')
@section('title', 'Testimoni')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Testimoni']]" />
<x-admin.section-title title="Daftar Testimoni" subtitle="Kelola testimoni klien">
    <x-slot:actions><x-admin.add-button route="admin.testimonials.create" label="Tambah Testimoni" /></x-slot:actions>
</x-admin.section-title>
<x-admin.search route="admin.testimonials.index" placeholder="Cari testimoni..." />
<x-admin.table>
    <x-slot:head>
        <x-admin.th class="w-10">No</x-admin.th>
        <x-admin.th class="w-12">Avatar</x-admin.th>
        <x-admin.th>Nama / Role</x-admin.th>
        <x-admin.th class="w-20">Rating</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-16">Urutan</x-admin.th>
        <x-admin.th class="w-28">Dibuat Pada</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($testimonials as $index => $t)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="text-gray-400 text-xs">{{ $testimonials->firstItem() + $index }}</x-admin.td>
        <x-admin.td>
            @if($t->avatar)
            <img src="{{ $t->avatar }}" class="w-8 h-8 rounded-full object-cover border border-gray-100 shadow-sm">
            @else
            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-xs font-bold">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
            @endif
        </x-admin.td>
        <x-admin.td>
            <div class="font-medium">{{ $t->name }}</div>
            @if($t->role)<div class="text-xs text-gray-400 mt-0.5">{{ $t->role }}</div>@endif
        </x-admin.td>
        <x-admin.td>
            @if($t->rating)
            <span class="text-amber-400 text-xs">{{ str_repeat('★', $t->rating) }}</span>
            @else
            <span class="text-gray-400">-</span>
            @endif
        </x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="testimonials" :id="$t->id" :checked="$t->status" /></x-admin.td>
        <x-admin.td class="text-gray-500 text-xs">{{ $t->sort_order ?? 0 }}</x-admin.td>
        <x-admin.td class="text-gray-400 text-xs">{{ $t->created_at->format('d M Y H:i') }}</x-admin.td>
        <x-admin.td><x-admin.actions edit="admin.testimonials.edit" destroy="admin.testimonials.destroy" :params="[$t]" /></x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="8" message="Belum ada testimoni.">
        <a href="{{ route('admin.testimonials.create') }}" class="inline-block text-blue-600 text-xs mt-2 hover:underline">Tambah testimoni pertama</a>
    </x-admin.empty-state>
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $testimonials->firstItem() ?? 0 }} sampai {{ $testimonials->lastItem() ?? 0 }} dari {{ $testimonials->total() }} data</p>
        {{ $testimonials->appends(['search' => request('search')])->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
