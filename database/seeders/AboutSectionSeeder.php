<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::updateOrCreate(
            ['is_active' => true],
            [
                'title' => 'Mitra Terpercaya untuk Kebutuhan Website Bisnis Anda',
                'subtitle' => 'Tentang INOWEB',
                'description' => 'INOWEB adalah penyedia jasa pembuatan website profesional yang berbasis di Indonesia. Kami berkomitmen untuk membantu bisnis, UMKM, dan perusahaan memiliki website modern, cepat, dan sesuai kebutuhan. Dengan pengalaman di berbagai industri, kami menghadirkan solusi digital yang tepat guna dan terjangkau.',
                'vision' => 'Menjadi mitra digital terdepan yang membantu setiap bisnis di Indonesia memiliki kehadiran online yang profesional dan berdampak.',
                'mission' => [
                    'Menyediakan layanan pembuatan website berkualitas dengan harga terjangkau',
                    'Membangun sistem yang scalable dan mudah dikelola',
                    'Memberikan pendampingan dan support teknis terbaik',
                    'Terus berinovasi mengikuti perkembangan teknologi terbaru',
                ],
                'image' => '',
                'is_active' => true,
            ]
        );

        $this->command->info('About section seeded successfully.');
    }
}
