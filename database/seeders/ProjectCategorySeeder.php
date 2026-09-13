<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Company Profile', 'slug' => 'company', 'description' => 'Website company profile profesional untuk perusahaan, instansi, dan organisasi.', 'sort_order' => 1],
            ['name' => 'Katalog Produk', 'slug' => 'catalog', 'description' => 'Website katalog digital interaktif untuk menampilkan produk.', 'sort_order' => 2],
            ['name' => 'Sistem Management', 'slug' => 'sistem', 'description' => 'Aplikasi web custom untuk mengelola operasional bisnis.', 'sort_order' => 3],
        ];

        foreach ($categories as $category) {
            $row = ProjectCategory::withTrashed()->firstOrNew(['slug' => $category['slug']]);
            if ($row->trashed()) {
                $row->restore();
            }
            $row->fill($category + ['status' => true])->save();
        }

        $this->command->info('Project categories seeded successfully.');
    }
}
