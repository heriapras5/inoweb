<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['name' => 'Andi Pratama', 'role' => 'Owner, WoodCraft Furniture', 'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg', 'quote' => 'INOWEB sangat profesional dan hasil webnya luar biasa. Desain modern, cepat, dan mudah dikelola. Sangat direkomendasikan!', 'rating' => 5, 'sort_order' => 1],
            ['name' => 'Dewi Lestari', 'role' => 'Marketing Manager, NaturalHerbs', 'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg', 'quote' => 'Tim INOWEB responsif, kreatif, dan sangat membantu bisnis kami berkembang di dunia digital. Hasilnya melebihi ekspektasi!', 'rating' => 5, 'sort_order' => 2],
            ['name' => 'Rizky Kurniawan', 'role' => 'CEO, BuildPro Construction', 'avatar' => 'https://randomuser.me/api/portraits/men/75.jpg', 'quote' => 'Prosesnya mudah dan cepat, support juga sangat ramah. Website kami jadi lebih profesional dan meningkatkan kepercayaan pelanggan.', 'rating' => 5, 'sort_order' => 3],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
