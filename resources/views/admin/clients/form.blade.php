@extends('admin.layouts.app')
@section('title', $client->exists ? 'Edit Klien' : 'Tambah Klien')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Klien', 'url' => route('admin.clients.index')], ['label' => $client->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-xl">
    <x-admin.form-card :title="$client->exists ? 'Edit Klien' : 'Tambah Klien'">
        <form action="{{ $client->exists ? route('admin.clients.update', $client) : route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @if($client->exists) @method('PUT') @endif
            <x-admin.input name="name" label="Nama" :value="$client->name" required />
            <x-admin.image-upload name="logo" label="Logo" :existing="$client->logo" hint="Format: JPG, PNG, WEBP, SVG. Maks 2MB." />
            <x-admin.input name="url" label="URL" :value="$client->url" />
            <x-admin.input name="sort_order" label="Urutan" type="number" :value="$client->sort_order ?? 0" />
            <x-admin.switch name="status" label="Aktif" :checked="old('status', $client->status ?? true)" />
            <x-admin.form-actions :cancelUrl="route('admin.clients.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
