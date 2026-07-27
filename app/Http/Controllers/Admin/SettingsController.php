<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $keys = ['site_name', 'site_tagline', 'site_description', 'logo_icon', 'logo_image', 'favicon', 'whatsapp_number', 'footer_address', 'footer_email'];
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = Setting::where('key', $key)->value('value');
        }
        $about = AboutSection::where('is_active', true)->first() ?? new AboutSection;
        return view('admin.settings.index', compact('settings', 'keys', 'about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'logo_icon' => 'nullable|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,ico,webp|max:1024',
            'whatsapp_number' => 'nullable|string|max:20',
            'footer_address' => 'nullable|string|max:500',
            'footer_email' => 'nullable|email|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_subtitle' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_vision' => 'nullable|string',
            'about_mission' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'remove_logo_image' => 'nullable|boolean',
            'remove_favicon' => 'nullable|boolean',
            'remove_about_image' => 'nullable|boolean',
        ]);

        foreach (['site_name', 'site_tagline', 'site_description', 'logo_icon', 'whatsapp_number', 'footer_address', 'footer_email'] as $key) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data[$key] ?? '', 'group' => 'general', 'type' => 'text']
            );
        }

        if ($request->boolean('remove_logo_image')) {
            deleteFile(Setting::where('key', 'logo_image')->value('value'));
            Setting::updateOrCreate(['key' => 'logo_image'], ['value' => '', 'group' => 'general', 'type' => 'text']);
        } elseif ($request->hasFile('logo_image')) {
            deleteFile(Setting::where('key', 'logo_image')->value('value'));
            $path = $request->file('logo_image')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'logo_image'], ['value' => 'storage/' . $path, 'group' => 'general', 'type' => 'text']);
        }

        if ($request->boolean('remove_favicon')) {
            deleteFile(Setting::where('key', 'favicon')->value('value'));
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => '', 'group' => 'general', 'type' => 'text']);
        } elseif ($request->hasFile('favicon')) {
            deleteFile(Setting::where('key', 'favicon')->value('value'));
            $path = $request->file('favicon')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => 'storage/' . $path, 'group' => 'general', 'type' => 'text']);
        }

        $aboutData = [
            'title' => $data['about_title'] ?? '',
            'subtitle' => $data['about_subtitle'] ?? '',
            'description' => $data['about_description'] ?? '',
            'vision' => $data['about_vision'] ?? '',
            'mission' => $data['about_mission'] ? array_filter(explode("\n", str_replace("\r", "", $data['about_mission']))) : null,
            'is_active' => true,
        ];

        if ($request->boolean('remove_about_image')) {
            $oldImage = AboutSection::where('is_active', true)->value('image');
            deleteFile($oldImage);
            $aboutData['image'] = '';
        } elseif ($request->hasFile('about_image')) {
            deleteFile(AboutSection::where('is_active', true)->value('image'));
            $path = $request->file('about_image')->store('settings', 'public');
            $aboutData['image'] = 'storage/' . $path;
        } else {
            $aboutData['image'] = AboutSection::where('is_active', true)->value('image') ?? '';
        }

        AboutSection::updateOrCreate(['is_active' => true], $aboutData);

        forgetSettingsCache();

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
