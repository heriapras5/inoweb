<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@aksarabaja.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@aksarabaja.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        $this->call([
            SettingsSeeder::class,
            ServiceSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
