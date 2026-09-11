@extends('admin.layouts.app')
@section('title', $menu->exists ? 'Edit Menu' : 'Tambah Menu')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Menu', 'url' => route('admin.menus.index')], ['label' => $menu->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-xl">
    <x-admin.form-card :title="$menu->exists ? 'Edit Menu' : 'Tambah Menu'">
        <form action="{{ $menu->exists ? route('admin.menus.update', $menu) : route('admin.menus.store') }}" method="POST" class="space-y-5">
            @csrf @if($menu->exists) @method('PUT') @endif
            <x-admin.input name="name" label="Nama" :value="$menu->name" required />
            <x-admin.input name="url" label="URL" :value="$menu->url" placeholder="/tentang-kami" />
            <div>
                <label class="form-label">Menu Induk (opsional)</label>
                <select name="parent_id" class="admin-input bg-white">
                    <option value="">- Menu Utama -</option>
                    @foreach($parents as $p)
                    <option value="{{ $p->id }}" @selected(old('parent_id', $menu->parent_id) == $p->id)>{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-admin.input name="icon" label="Ikon" :value="$menu->icon" />
                <x-admin.input name="sort_order" label="Urutan" type="number" :value="$menu->sort_order ?? 0" />
            </div>
            <x-admin.switch name="status" label="Aktif" :checked="old('status', $menu->status ?? true)" />
            <x-admin.form-actions :cancelUrl="route('admin.menus.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
