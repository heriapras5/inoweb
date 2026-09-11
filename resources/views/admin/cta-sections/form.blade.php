@extends('admin.layouts.app')
@section('title', $section->exists ? 'Edit CTA' : 'Tambah CTA')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'CTA', 'url' => route('admin.cta-sections.index')], ['label' => $section->exists ? 'Edit' : 'Tambah']]" />
<div class="max-w-xl">
    <x-admin.form-card :title="$section->exists ? 'Edit CTA' : 'Tambah CTA'">
        <form action="{{ $section->exists ? route('admin.cta-sections.update', $section) : route('admin.cta-sections.store') }}" method="POST" class="space-y-5">
            @csrf @if($section->exists) @method('PUT') @endif
            <x-admin.input name="title" label="Judul" :value="$section->title" required />
            <x-admin.textarea name="description" label="Deskripsi" :value="$section->description" :rows="3" />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-admin.input name="button_text" label="Teks Tombol" :value="$section->button_text" />
                <x-admin.input name="button_url" label="URL Tombol" :value="$section->button_url" />
            </div>
            <x-admin.switch name="is_active" label="Aktif" :checked="old('is_active', $section->is_active ?? true)" />
            <x-admin.form-actions :cancelUrl="route('admin.cta-sections.index')" submitLabel="Simpan" />
        </form>
    </x-admin.form-card>
</div>
@endsection
