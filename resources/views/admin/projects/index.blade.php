@extends('admin.layouts.app')
@section('title', 'Proyek')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Proyek']]" />
<x-admin.section-title title="Daftar Projek" subtitle="Kelola semua projek/portofolio website">
    <x-slot:actions><x-admin.add-button route="admin.projects.create" label="Tambah Proyek" /></x-slot:actions>
</x-admin.section-title>
<x-admin.search route="admin.projects.index" placeholder="Cari projek..." :filterNames="['search', 'category_id']">
    <x-slot:filters>
        <select name="category_id" class="admin-input w-44">
            <option value="">Semua Kategori</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
    </x-slot:filters>
</x-admin.search>
<x-admin.table>
    <x-slot:head>
        <x-admin.th class="w-10">No</x-admin.th>
        <x-admin.th class="w-16">Gambar</x-admin.th>
        <x-admin.th>Judul Projek</x-admin.th>
        <x-admin.th>Kategori</x-admin.th>
        <x-admin.th class="w-16">Tahun</x-admin.th>
        <x-admin.th class="w-28">Status</x-admin.th>
        <x-admin.th class="w-24 text-right">Aksi</x-admin.th>
    </x-slot:head>
    @forelse($projects as $index => $p)
    <tr class="hover:bg-blue-50/30 transition-colors">
        <x-admin.td class="text-gray-400 text-xs">{{ $projects->firstItem() + $index }}</x-admin.td>
        <x-admin.td>
            @if($p->coverImage())
            <img src="{{ asset($p->coverImage()->image) }}" class="w-14 h-10 object-cover rounded-lg shadow-sm border border-gray-100">
            @else
            <div class="w-14 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
            </div>
            @endif
        </x-admin.td>
        <x-admin.td>
            <div class="font-medium">{{ $p->name }}</div>
            @if($p->client)<div class="text-[11px] text-gray-400 font-normal mt-0.5">Klien: {{ $p->client }}</div>@endif
        </x-admin.td>
        <x-admin.td>
            @if($p->categories->count())
            <div class="flex flex-wrap gap-1">
                @foreach($p->categories as $c)
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold"
                      style="background: {{ match($c->slug) { 'company' => '#eff6ff', 'catalog' => '#fefce8', 'umkm' => '#f0fdf4', 'sistem' => '#faf5ff', 'landing' => '#fff1f2', 'custom' => '#fff7ed', default => '#f1f5f9' } }}; color: {{ match($c->slug) { 'company' => '#1d4ed8', 'catalog' => '#a16207', 'umkm' => '#15803d', 'sistem' => '#7e22ce', 'landing' => '#e11d48', 'custom' => '#ea580c', default => '#475569' } }};">
                    {{ $c->name }}
                </span>
                @endforeach
            </div>
            @else
            <span class="text-gray-400">-</span>
            @endif
        </x-admin.td>
        <x-admin.td class="text-gray-500 text-xs">{{ $p->year ?: '-' }}</x-admin.td>
        <x-admin.td><x-admin.status-toggle resource="projects" :id="$p->id" :checked="$p->status" /></x-admin.td>
        <x-admin.td>
            <x-admin.actions edit="admin.projects.edit" destroy="admin.projects.destroy" :params="[$p]">
                <a href="{{ url('/portfolio/' . $p->slug) }}" target="_blank" title="Lihat"
                   class="p-2 rounded-lg hover:bg-sky-50 text-gray-400 hover:text-sky-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                </a>
            </x-admin.actions>
        </x-admin.td>
    </tr>
    @empty
    <x-admin.empty-state :colspan="7" message="Belum ada proyek.">
        <a href="{{ route('admin.projects.create') }}" class="inline-block text-blue-600 text-xs mt-2 hover:underline">Tambah proyek pertama</a>
    </x-admin.empty-state>
    @endforelse
    <x-slot:footer>
        <p>Menampilkan {{ $projects->firstItem() ?? 0 }} sampai {{ $projects->lastItem() ?? 0 }} dari {{ $projects->total() }} data</p>
        {{ $projects->appends(['search' => request('search'), 'category_id' => request('category_id')])->links() }}
    </x-slot:footer>
</x-admin.table>
@endsection
