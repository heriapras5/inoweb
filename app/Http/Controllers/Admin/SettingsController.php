<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $keys = ['site_name', 'site_tagline', 'site_description', 'logo_icon', 'logo_image', 'favicon'];
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = Setting::where('key', $key)->value('value');
        }
        return view('admin.settings.index', compact('settings', 'keys'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'logo_icon' => 'nullable|string',
            'logo_image' => 'nullable|string|max:255',
            'favicon' => 'nullable|string|max:255',
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '', 'group' => 'general', 'type' => 'text']
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
