<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
                'title' => 'Company Profile',
                'slug' => 'company-profile',
                'description' => 'Website profesional untuk meningkatkan kredibilitas bisnis Anda. Cocok untuk perusahaan, instansi, dan organisasi.',
                'features' => ['Desain eksklusif', 'Halaman profil', 'Galeri produk/jasa', 'Form kontak', 'Integrasi WA', 'SEO optimized'],
                'sort_order' => 1,
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
                'title' => 'Katalog Produk',
                'slug' => 'katalog-produk',
                'description' => 'Tampilkan produk Anda dengan katalog digital interaktif yang menarik dan mudah diakses pelanggan.',
                'features' => ['Katalog digital', 'Filter kategori', 'Search produk', 'Galeri gambar', 'Integrasi WA', 'Panel admin'],
                'sort_order' => 2,
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
                'title' => 'Website UMKM',
                'slug' => 'website-umkm',
                'description' => 'Solusi digital terjangkau untuk membantu UMKM naik kelas dan menjangkau lebih banyak pelanggan.',
                'features' => ['Harga terjangkau', 'Desain responsif', 'Menu produk', 'Info kontak', 'Integrasi WA', 'Easy manage'],
                'sort_order' => 3,
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
                'title' => 'Sistem Management',
                'slug' => 'sistem-management',
                'description' => 'Aplikasi web custom untuk mengelola operasional bisnis Anda lebih efisien dan terstruktur.',
                'features' => ['Custom fitur', 'Multi-user', 'Laporan otomatis', 'Database terpadu', 'Cloud based', 'Support penuh'],
                'sort_order' => 4,
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
                'title' => 'Custom Website',
                'slug' => 'custom-website',
                'description' => 'Solusi website khusus yang dirancang sesuai kebutuhan unik bisnis Anda. Bebas tentukan fitur!',
                'features' => ['Fleksibel', 'Sesuai kebutuhan', 'Scalable', 'Maintenance', 'Support 24/7', 'Teknologi modern'],
                'sort_order' => 5,
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12" y2="18"/></svg>',
                'title' => 'Landing Page',
                'slug' => 'landing-page',
                'description' => 'Halaman landing profesional untuk kampanye, promosi, atau peluncuran produk dengan konversi tinggi.',
                'features' => ['Desain fokus', 'Fast loading', 'CTA strategis', 'Form lead', 'Integrasi WA', 'Analytics'],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            $row = Service::withTrashed()->firstOrNew(['slug' => $service['slug']]);
            if ($row->trashed()) {
                $row->restore();
            }
            $row->fill($service)->save();
        }
    }
}
