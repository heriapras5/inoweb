<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use App\Models\ProjectFeature;
use App\Models\ProjectTechnology;
use App\Models\ProjectResult;
use App\Models\ProjectTestimonial;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ProjectCategory::pluck('id', 'slug');

        $projects = [
            [
                'category_id' => $categories['company'],
                'name' => 'WoodCraft Furniture',
                'slug' => 'woodcraft-furniture',
                'url' => 'https://woodcraft-furniture.example.com',
                'client' => 'WoodCraft Furniture',
                'year' => '2024',
                'duration' => '3 Minggu',
                'description' => 'Website company profile profesional untuk perusahaan furniture dengan desain modern, elegan, dan responsif di semua perangkat.',
                'about' => [
                    'WoodCraft Furniture adalah perusahaan furniture yang berfokus pada kualitas dan desain elegan. Kami merancang website company profile yang menampilkan identitas brand secara profesional dengan pengalaman pengguna yang optimal.',
                    'Website ini dirancang responsif, cepat, dan mudah dikelola oleh tim internal menggunakan sistem manajemen konten yang fleksibel.',
                ],
                'stats' => [
                    ['number' => '12+', 'label' => 'Halaman'],
                    ['number' => '50+', 'label' => 'Produk Ditampilkan'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '98', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website ini membantu WoodCraft Furniture meningkatkan kredibilitas brand dan memudahkan pelanggan dalam melihat produk serta menghubungi perusahaan.',
                'is_featured' => true,
                'features' => ['Desain responsif di semua perangkat', 'Halaman profil perusahaan', 'Katalog produk dengan galeri', 'Formulir kontak & peta lokasi', 'Optimasi SEO untuk performa terbaik', 'Kecepatan loading yang optimal', 'Panel admin mudah digunakan'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind CSS', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'Alpine.js', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                    ['name' => 'MySQL', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>'],
                    ['name' => 'Vite', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+120%', 'label' => 'Peningkatan Trafik', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+85%', 'label' => 'Waktu di Halaman', 'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'],
                    ['number' => '+65%', 'label' => 'Leads Baru', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                    ['number' => '98/100', 'label' => 'Skor Performa', 'icon' => '<path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/>'],
                ],
                'testimonial' => ['quote' => 'INOWEB sangat profesional dalam memahami kebutuhan kami. Hasilnya website yang modern, cepat, dan mudah dikelola. Sangat direkomendasikan!', 'name' => 'Andi Pratama', 'role' => 'Direktur, WoodCraft Furniture', 'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg'],
            ],
            [
                'category_id' => $categories['catalog'],
                'name' => 'NaturalHerbs Indonesia',
                'slug' => 'naturalherbs-indonesia',
                'url' => 'https://naturalherbs-indonesia.example.com',
                'client' => 'NaturalHerbs Indonesia',
                'year' => '2024',
                'duration' => '4 Minggu',
                'description' => 'Website katalog produk suplemen herbal dengan sistem filtering dan pencarian produk yang lengkap.',
                'about' => [
                    'NaturalHerbs Indonesia adalah perusahaan yang bergerak di bidang suplemen herbal. Kami mengembangkan website katalog produk yang memudahkan pelanggan mencari dan menemukan produk yang sesuai dengan kebutuhan mereka.',
                    'Website dilengkapi dengan sistem pencarian, filter kategori, dan manajemen produk yang mudah digunakan oleh tim marketing.',
                ],
                'stats' => [
                    ['number' => '200+', 'label' => 'Produk'],
                    ['number' => '15+', 'label' => 'Kategori'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '95', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website NaturalHerbs Indonesia berhasil meningkatkan visibilitas produk dan memudahkan pelanggan dalam menemukan suplemen yang sesuai dengan kebutuhan.',
                'is_featured' => true,
                'features' => ['Katalog produk dengan filter & search', 'Detail produk lengkap', 'Sistem manajemen produk', 'Integrasi WhatsApp', 'Optimasi SEO', 'Desain responsif'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind CSS', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'MySQL', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>'],
                    ['name' => 'Alpine.js', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1550572017-edd951b55104?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+150%', 'label' => 'Peningkatan Trafik', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+90%', 'label' => 'Waktu di Halaman', 'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'],
                    ['number' => '+75%', 'label' => 'Konversi', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                ],
                'testimonial' => ['quote' => 'Tim INOWEB sangat kreatif dan memahami kebutuhan bisnis kami. Hasilnya melebihi ekspektasi dan website kami kini lebih profesional.', 'name' => 'Dewi Lestari', 'role' => 'Marketing Manager, NaturalHerbs', 'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg'],
            ],
            [
                'category_id' => $categories['company'],
                'name' => 'AutoDrive Indonesia',
                'slug' => 'autodrive-indonesia',
                'url' => 'https://autodrive-indonesia.example.com',
                'client' => 'AutoDrive Indonesia',
                'year' => '2024',
                'duration' => '5 Minggu',
                'description' => 'Website company profile untuk dealer mobil dengan tampilan profesional dan sistem manajemen inventaris kendaraan.',
                'about' => ['AutoDrive Indonesia adalah dealer mobil yang menyediakan berbagai jenis kendaraan. Kami merancang website company profile yang menampilkan portofolio kendaraan secara profesional.'],
                'stats' => [
                    ['number' => '8+', 'label' => 'Halaman'],
                    ['number' => '100+', 'label' => 'Unit Kendaraan'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '92', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website AutoDrive Indonesia membantu meningkatkan kepercayaan pelanggan dan memudahkan proses pencarian kendaraan.',
                'is_featured' => true,
                'features' => ['Desain modern & elegan', 'Katalog kendaraan lengkap', 'Filter & pencarian', 'Formulir kontak & test drive', 'Integrasi WhatsApp', 'Panel admin'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind CSS', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'Alpine.js', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1619682817481-e994891cd1f5?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+100%', 'label' => 'Peningkatan Trafik', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+60%', 'label' => 'Lead Baru', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                ],
                'testimonial' => ['quote' => 'INOWEB memberikan solusi yang tepat untuk kebutuhan website dealer kami. Profesional dan responsif!', 'name' => 'Budi Santoso', 'role' => 'Owner, AutoDrive Indonesia', 'avatar' => 'https://randomuser.me/api/portraits/men/45.jpg'],
            ],
            [
                'category_id' => $categories['company'],
                'name' => 'BuildPro Construction',
                'slug' => 'buildpro-construction',
                'url' => 'https://buildpro-construction.example.com',
                'client' => 'BuildPro Construction',
                'year' => '2024',
                'duration' => '4 Minggu',
                'description' => 'Website company profile untuk perusahaan konstruksi dengan portofolio proyek dan layanan lengkap.',
                'about' => ['BuildPro Construction adalah perusahaan konstruksi dan kontraktor terpercaya. Website ini dirancang untuk menampilkan portofolio proyek dan layanan secara profesional.'],
                'stats' => [
                    ['number' => '10+', 'label' => 'Halaman'],
                    ['number' => '30+', 'label' => 'Proyek'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '94', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website ini membantu BuildPro Construction menampilkan kredibilitas dan portofolio proyek kepada calon klien.',
                'is_featured' => true,
                'features' => ['Desain profesional', 'Portofolio proyek', 'Layanan lengkap', 'Formulir kontak', 'Gallery proyek', 'Integrasi WhatsApp'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind CSS', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'MySQL', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+80%', 'label' => 'Peningkatan Trafik', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+50%', 'label' => 'Inquiry Baru', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                ],
                'testimonial' => ['quote' => 'Website dari INOWEB benar-benar membantu bisnis konstruksi kami terlihat lebih profesional dan terpercaya.', 'name' => 'Rizky Kurniawan', 'role' => 'CEO, BuildPro Construction', 'avatar' => 'https://randomuser.me/api/portraits/men/75.jpg'],
            ],
            [
                'category_id' => $categories['catalog'],
                'name' => 'Luxury Interior',
                'slug' => 'luxury-interior',
                'url' => 'https://luxury-interior.example.com',
                'client' => 'Luxury Interior',
                'year' => '2024',
                'duration' => '3 Minggu',
                'description' => 'Website katalog produk interior dengan galeri produk yang memukau dan sistem manajemen yang mudah.',
                'about' => ['Luxury Interior menyediakan berbagai produk interior premium. Website katalog produk ini dirancang untuk menampilkan produk-produk berkualitas dengan tampilan visual yang menarik.'],
                'stats' => [
                    ['number' => '6+', 'label' => 'Halaman'],
                    ['number' => '80+', 'label' => 'Produk'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '93', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website Luxury Interior berhasil menampilkan produk-produk premium secara visual dan meningkatkan engagement pelanggan.',
                'is_featured' => true,
                'features' => ['Galeri produk高清', 'Filter kategori', 'Pencarian produk', 'Detail produk lengkap', 'Integrasi WhatsApp', 'Panel admin'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'Alpine.js', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+130%', 'label' => 'Trafik', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+70%', 'label' => 'Inquiry', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                ],
                'testimonial' => ['quote' => 'Desain websitenya sangat elegan dan mewah, sesuai dengan brand kami.', 'name' => 'Sarah Wijaya', 'role' => 'Owner, Luxury Interior', 'avatar' => 'https://randomuser.me/api/portraits/women/33.jpg'],
            ],
            [
                'category_id' => $categories['umkm'],
                'name' => 'Kopi Nusantara',
                'slug' => 'kopi-nusantara',
                'url' => 'https://kopi-nusantara.example.com',
                'client' => 'Kopi Nusantara',
                'year' => '2024',
                'duration' => '2 Minggu',
                'description' => 'Website UMKM kedai kopi dengan sistem menu digital dan informasi lengkap tentang varian kopi.',
                'about' => ['Kopi Nusantara adalah kedai kopi UMKM yang menyajikan berbagai varian kopi dari seluruh Nusantara. Website ini membantu mereka tampil lebih profesional di era digital.'],
                'stats' => [
                    ['number' => '4+', 'label' => 'Halaman'],
                    ['number' => '25+', 'label' => 'Menu Kopi'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '90', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Website Kopi Nusantara membantu UMKM ini go digital dan menjangkau lebih banyak pelanggan baru.',
                'is_featured' => true,
                'features' => ['Menu digital interaktif', 'Informasi varian kopi', 'Lokasi & jam operasional', 'Integrasi WhatsApp order', 'Gallery suasana kedai', 'Desain responsif'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+200%', 'label' => 'Pelanggan Baru', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+85%', 'label' => 'Online Order', 'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
                ],
                'testimonial' => ['quote' => 'Terima kasih INOWEB! Kini kedai kopi kami punya website keren yang memudahkan pelanggan memesan.', 'name' => 'Ahmad Fauzi', 'role' => 'Owner, Kopi Nusantara', 'avatar' => 'https://randomuser.me/api/portraits/men/22.jpg'],
            ],
            [
                'category_id' => $categories['sistem'],
                'name' => 'RepairFlow Manager',
                'slug' => 'repairflow-manager',
                'url' => 'https://repairflow-manager.example.com',
                'client' => 'RepairFlow',
                'year' => '2024',
                'duration' => '6 Minggu',
                'description' => 'Sistem management untuk bisnis jasa servis dan perbaikan perangkat dengan fitur lengkap.',
                'about' => ['RepairFlow Manager adalah sistem manajemen untuk bisnis jasa servis perangkat elektronik. Sistem ini membantu mengelola ticketing, inventaris, dan penjadwalan teknisi.'],
                'stats' => [
                    ['number' => '20+', 'label' => 'Fitur'],
                    ['number' => '500+', 'label' => 'Transaksi/Bulan'],
                    ['number' => '100%', 'label' => 'Web Based'],
                    ['number' => '98', 'label' => 'Uptime'],
                ],
                'result_text' => 'RepairFlow Manager berhasil meningkatkan efisiensi operasional bisnis servis hingga 60%.',
                'is_featured' => true,
                'features' => ['Manajemen tiket servis', 'Inventaris sparepart', 'Penjadwalan teknisi', 'Laporan keuangan', 'Notifikasi otomatis', 'Multi-user role'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                    ['name' => 'Alpine.js', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                    ['name' => 'MySQL', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+60%', 'label' => 'Efisiensi', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '99%', 'label' => 'Kepuasan', 'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>'],
                ],
                'testimonial' => ['quote' => 'Sistem dari INOWEB benar-benar membantu bisnis servis kami jadi lebih terorganisir dan profesional.', 'name' => 'Dian Permata', 'role' => 'Owner, RepairFlow', 'avatar' => 'https://randomuser.me/api/portraits/women/68.jpg'],
            ],
            [
                'category_id' => $categories['landing'],
                'name' => 'AdventureX',
                'slug' => 'adventurex',
                'url' => 'https://adventurex.example.com',
                'client' => 'AdventureX Community',
                'year' => '2024',
                'duration' => '2 Minggu',
                'description' => 'Landing page untuk komunitas adventure dengan desain yang energik dan menarik.',
                'about' => ['AdventureX adalah komunitas pecinta alam dan petualangan. Landing page ini dirancang dengan desain energik untuk menarik anggota baru dan mempromosikan kegiatan komunitas.'],
                'stats' => [
                    ['number' => '1', 'label' => 'Halaman'],
                    ['number' => '200+', 'label' => 'Anggota'],
                    ['number' => '100%', 'label' => 'Responsif'],
                    ['number' => '96', 'label' => 'Skor SEO'],
                ],
                'result_text' => 'Landing page AdventureX berhasil meningkatkan pendaftaran anggota baru secara signifikan.',
                'is_featured' => true,
                'features' => ['Desain visual yang menarik', 'Informasi kegiatan', 'Galeri foto petualangan', 'Form pendaftaran anggota', 'Integrasi media sosial', 'Fast loading'],
                'technologies' => [
                    ['name' => 'Laravel', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'],
                    ['name' => 'Tailwind', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1533750349088-cd871a92f312?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1551632811-561732d1e306?w=600&h=400&fit=crop',
                ],
                'results' => [
                    ['number' => '+150%', 'label' => 'Anggota Baru', 'icon' => '<path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/>'],
                    ['number' => '+90%', 'label' => 'Engagement', 'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'],
                ],
                'testimonial' => ['quote' => 'Landing page dari INOWEB keren banget! Banyak anggota baru yang mendaftar setelah website kami launching.', 'name' => 'Rangga Aditya', 'role' => 'Founder, AdventureX', 'avatar' => 'https://randomuser.me/api/portraits/men/55.jpg'],
            ],
        ];

        foreach ($projects as $data) {
            $testimonialData = $data['testimonial'];
            $features = $data['features'];
            $technologies = $data['technologies'];
            $images = $data['images'];
            $results = $data['results'];
            unset($data['testimonial'], $data['features'], $data['technologies'], $data['images'], $data['results']);

            $project = Project::withTrashed()->firstOrNew(['slug' => $data['slug']]);
            $isNew = ! $project->exists;
            if ($project->trashed()) {
                $project->restore();
            }
            $project->fill($data)->save();
            if (! $isNew) continue;

            ProjectTestimonial::create(array_merge($testimonialData, ['project_id' => $project->id]));

            foreach ($features as $i => $feature) {
                ProjectFeature::create(['project_id' => $project->id, 'feature' => $feature, 'sort_order' => $i]);
            }

            foreach ($technologies as $i => $tech) {
                ProjectTechnology::create(array_merge($tech, ['project_id' => $project->id, 'sort_order' => $i]));
            }

            foreach ($images as $i => $image) {
                ProjectImage::create(['project_id' => $project->id, 'image' => $image, 'sort_order' => $i]);
            }

            foreach ($results as $i => $result) {
                ProjectResult::create(array_merge($result, ['project_id' => $project->id, 'sort_order' => $i]));
            }
        }
    }
}
