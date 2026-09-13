<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['title' => 'Solusi Website Profesional Untuk Bisnis'],
            [
                'subtitle' => 'INOWEB hadir untuk membantu bisnis, UMKM, dan perusahaan memiliki website modern, cepat, dan sesuai kebutuhan Anda.',
                'description' => null,
                'button_text' => 'Konsultasi Gratis',
                'button_url' => 'https://wa.me/6285736186308?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20pembuatan%20website',
                'image' => null,
                'is_active' => true,
                'sort_order' => 0,
            ]
        );

        $this->command->info('Hero section seeded successfully.');
    }
}
