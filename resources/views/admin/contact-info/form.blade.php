@extends('admin.layouts.app')
@section('title', $item->exists ? 'Edit Info Kontak' : 'Tambah Info Kontak')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Info Kontak', 'url' => route('admin.contact-info.index')], ['label' => $item->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-xl">
    <x-admin.form-card :title="$item->exists ? 'Edit Info Kontak' : 'Tambah Info Kontak'">
        <form action="{{ $item->exists ? route('admin.contact-info.update', $item) : route('admin.contact-info.store') }}" method="POST" class="space-y-5">
            @csrf @if($item->exists) @method('PUT') @endif
            <x-admin.select name="type" label="Tipe" :options="['address' => 'Alamat', 'phone' => 'Telepon', 'email' => 'Email', 'hours' => 'Jam Operasional', 'social' => 'Sosial Media', 'other' => 'Lainnya']" :selected="old('type', $item->type)" />
            <x-admin.input name="label" label="Label" :value="$item->label" placeholder="cth: Alamat Kantor" required />
            <x-admin.textarea name="value" label="Nilai" :value="$item->value" :rows="3" required />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-admin.input name="icon" label="Ikon" :value="$item->icon" />
                <x-admin.input name="sort_order" label="Urutan" type="number" :value="$item->sort_order ?? 0" />
            </div>
            <x-admin.switch name="status" label="Aktif" :checked="old('status', $item->status ?? true)" />
            <x-admin.form-actions :cancelUrl="route('admin.contact-info.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
