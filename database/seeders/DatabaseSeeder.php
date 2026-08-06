<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@inoweb.my.id'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('@Segoku123'),
                'is_admin' => true,
            ]
        );

        $this->call([
            SettingsSeeder::class,
            ProjectCategorySeeder::class,
            ServiceSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
