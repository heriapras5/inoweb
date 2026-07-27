<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Company Profile', 'slug' => 'company', 'sort_order' => 1],
            ['name' => 'Katalog Produk', 'slug' => 'catalog', 'sort_order' => 2],
            ['name' => 'Website UMKM', 'slug' => 'umkm', 'sort_order' => 3],
            ['name' => 'Sistem Management', 'slug' => 'sistem', 'sort_order' => 4],
            ['name' => 'Custom Website', 'slug' => 'custom', 'sort_order' => 5],
            ['name' => 'Landing Page', 'slug' => 'landing', 'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            ProjectCategory::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
