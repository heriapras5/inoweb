<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin INOWEB',
            'email' => 'admin@inoweb.id',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            SettingsSeeder::class,
            ProjectCategorySeeder::class,
            ServiceSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
