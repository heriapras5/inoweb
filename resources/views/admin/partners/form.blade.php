@extends('admin.layouts.app')
@section('title', $partner->exists ? 'Edit Partner' : 'Tambah Partner')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Partner', 'url' => route('admin.partners.index')], ['label' => $partner->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-xl">
    <x-admin.form-card :title="$partner->exists ? 'Edit Partner' : 'Tambah Partner'">
        <form action="{{ $partner->exists ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @if($partner->exists) @method('PUT') @endif
            <x-admin.input name="name" label="Nama" :value="$partner->name" required />
            <x-admin.image-upload name="logo" label="Logo" :existing="$partner->logo" hint="Format: JPG, PNG, WEBP, SVG. Maks 2MB." />
            <x-admin.input name="url" label="URL" :value="$partner->url" />
            <x-admin.input name="sort_order" label="Urutan" type="number" :value="$partner->sort_order ?? 0" />
            <x-admin.switch name="status" label="Aktif" :checked="old('status', $partner->status ?? true)" />
            <x-admin.form-actions :cancelUrl="route('admin.partners.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
