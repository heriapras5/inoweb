@extends('admin.layouts.app')
@section('title', 'Pengaturan')
@section('content')
<x-admin.breadcrumb :items="[['label' => 'Dashboard', 'url' => route('admin.dashboard')], ['label' => 'Pengaturan']]" />

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    @if($errors->any())
    <div class="max-w-4xl mx-auto mb-5 bg-red-50 border border-red-200 rounded-xl p-4">
        <p class="text-xs font-semibold text-red-700 mb-1">Terdapat {{ $errors->count() }} masalah pada form:</p>
        <ul class="list-disc list-inside text-xs text-red-600 space-y-0.5">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-4xl mx-auto space-y-5">
        <x-admin.form-card title="Informasi Website" description="Identitas dasar website Anda.">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-admin.input name="site_name" label="Nama Website" :value="$settings['site_name'] ?? 'INOWEB'" />
                    <x-admin.input name="site_tagline" label="Tagline" :value="$settings['site_tagline'] ?? 'INOVASI WEBSITE'" />
                </div>
                <x-admin.summernote name="site_description" label="Deskripsi Website (meta)" :value="$settings['site_description'] ?? ''" :height="160" />
                <x-admin.input name="whatsapp_number" label="Nomor WhatsApp" :value="$settings['whatsapp_number'] ?? '6285736186308'" placeholder="6285736186308" help="Format: kode negara + nomor, tanpa + atau spasi." />
                <x-admin.textarea name="footer_address" label="Alamat Footer" :value="$settings['footer_address'] ?? ''" :rows="2" placeholder="Jl. Contoh No. 123, Kota" />
                <x-admin.input name="footer_email" label="Email Footer" type="email" :value="$settings['footer_email'] ?? ''" placeholder="email@example.com" />
                <x-admin.textarea name="maps_embed" label="Google Maps Embed" :value="$settings['maps_embed'] ?? ''" :rows="3" placeholder="Kode embed iframe Google Maps" help="Kosongkan untuk tidak menampilkan peta." wrapperClass="[&_textarea]:font-mono [&_textarea]:text-xs" />
            </div>
        </x-admin.form-card>

        <x-admin.form-card title="Sosial Media" description="Tautan media sosial yang tampil di footer.">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-admin.input name="social_facebook" label="Facebook" type="url" :value="$settings['social_facebook'] ?? ''" placeholder="https://facebook.com/namapage" />
                    <x-admin.input name="social_instagram" label="Instagram" type="url" :value="$settings['social_instagram'] ?? ''" placeholder="https://instagram.com/namauser" />
                    <x-admin.input name="social_linkedin" label="LinkedIn" type="url" :value="$settings['social_linkedin'] ?? ''" placeholder="https://linkedin.com/in/namauser" />
                    <x-admin.input name="social_youtube" label="YouTube" type="url" :value="$settings['social_youtube'] ?? ''" placeholder="https://youtube.com/@channel" />
                </div>
                <p class="form-hint">Kosongkan jika tidak ingin menampilkan ikon media sosial tertentu.</p>
            </div>
        </x-admin.form-card>

        <x-admin.form-card title="Logo & Favicon" description="Atur logo dan ikon tab browser.">
            <div class="space-y-5">
                <div x-data="{ preview: null, removeImage: false }">
                    <label class="form-label">Logo Gambar</label>
                    <input type="file" name="logo_image" accept="image/png,image/jpeg,image/jpg,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeImage = false"
                           class="admin-input file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="form-hint mt-1">Kosongkan untuk menggunakan logo teks + ikon default. Maks 2MB.</p>
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-14 rounded-xl shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 shadow-sm">&times;</button>
                    </div>
                    @php $logoImage = $settings['logo_image'] ?? ''; @endphp
                    @if($logoImage)
                    <div x-show="!preview && !removeImage" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($logoImage) }}" class="h-14 rounded-xl border border-gray-100 shadow-sm" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_logo_image" value="1" @change="removeImage = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus logo
                        </label>
                    </div>
                    @endif
                </div>

                <div x-data="{ preview: null, removeFavicon: false }">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon" accept="image/png,image/jpeg,image/jpg,image/x-icon,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeFavicon = false"
                           class="admin-input file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="form-hint mt-1">Format: PNG, JPG, ICO, WEBP. Maks 1MB.</p>
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-10 rounded-lg shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 shadow-sm">&times;</button>
                    </div>
                    @php $favicon = $settings['favicon'] ?? ''; @endphp
                    @if($favicon)
                    <div x-show="!preview && !removeFavicon" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($favicon) }}" class="h-10 rounded-lg border border-gray-100 shadow-sm" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_favicon" value="1" @change="removeFavicon = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus favicon
                        </label>
                    </div>
                    @endif
                </div>
            </div>
        </x-admin.form-card>

        <x-admin.form-card title="Section Tentang" description="Konten halaman tentang kami.">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-admin.input name="about_title" label="Judul" :value="$about->title" />
                    <x-admin.input name="about_subtitle" label="Subjudul" :value="$about->subtitle" />
                </div>
                <x-admin.summernote name="about_description" label="Deskripsi" :value="$about->description" :height="200" />
                <x-admin.summernote name="about_vision" label="Visi" :value="$about->vision" :height="140" />
                <x-admin.textarea name="about_mission" label="Misi (satu baris per item)" :value="$about->mission ? implode(chr(10), $about->mission) : ''" :rows="5" placeholder="Menyediakan website berkualitas" />
                <div x-data="{ preview: null, removeAboutImage: false }">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="about_image" accept="image/png,image/jpeg,image/jpg,image/webp"
                           @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null; removeAboutImage = false"
                           class="admin-input file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <div x-show="preview" class="mt-3 relative inline-block">
                        <img :src="preview" class="h-28 rounded-xl shadow-sm border border-gray-100">
                        <button @click="preview = null; $el.closest('[x-data]').querySelector('input[type=file]').value = ''" type="button"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 shadow-sm">&times;</button>
                    </div>
                    @if($about->image)
                    <div x-show="!preview && !removeAboutImage" class="mt-3 flex items-center gap-4">
                        <img src="{{ asset($about->image) }}" class="h-28 rounded-xl shadow-sm border border-gray-100" onerror="this.style.display='none'">
                        <label class="flex items-center gap-1.5 text-xs text-red-500 cursor-pointer">
                            <input type="checkbox" name="remove_about_image" value="1" @change="removeAboutImage = $event.target.checked" class="rounded border-gray-300 text-red-500 focus:ring-red-500 w-3.5 h-3.5">
                            Hapus gambar
                        </label>
                    </div>
                    @endif
                </div>
            </div>
        </x-admin.form-card>

        <div class="flex justify-end">
            <x-admin.form-actions submitLabel="Simpan" />
        </div>
    </div>
</form>
@endsection
