<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name' => ['value' => 'INOWEB', 'group' => 'general', 'type' => 'text'],
            'site_tagline' => ['value' => 'INOVASI WEBSITE', 'group' => 'general', 'type' => 'text'],
            'site_description' => ['value' => 'INOWEB - Inovasi Website. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.', 'group' => 'general', 'type' => 'textarea'],
            'logo_icon' => ['value' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>', 'group' => 'general', 'type' => 'textarea'],
            'logo_image' => ['value' => '', 'group' => 'general', 'type' => 'text'],
            'favicon' => ['value' => '', 'group' => 'general', 'type' => 'text'],
            'whatsapp_number' => ['value' => '6285736186308', 'group' => 'general', 'type' => 'text'],
            'footer_address' => ['value' => 'Jl. Jepara-Bangsri KM.11, Ds. Sekuro RT 10/02, Mlonggo, Jepara.', 'group' => 'general', 'type' => 'text'],
            'footer_email' => ['value' => 'info@inoweb.my.id', 'group' => 'general', 'type' => 'text'],
            'maps_embed' => ['value' => '', 'group' => 'general', 'type' => 'text'],
            'social_facebook' => ['value' => 'https://www.facebook.com/share/19HdRpmhd3/', 'group' => 'general', 'type' => 'text'],
            'social_instagram' => ['value' => '', 'group' => 'general', 'type' => 'text'],
            'social_linkedin' => ['value' => '', 'group' => 'general', 'type' => 'text'],
            'social_youtube' => ['value' => '', 'group' => 'general', 'type' => 'text'],
        ];

        foreach ($defaults as $key => $data) {
            Setting::updateOrCreate(
                ['key' => $key],
                $data
            );
        }
    }
}
