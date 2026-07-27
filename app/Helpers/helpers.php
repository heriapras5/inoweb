<?php

if (!function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        $cache = \Illuminate\Support\Facades\Cache::remember('settings.all', 60, function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
        return $cache[$key] ?? $default;
    }
}

if (!function_exists('forgetSettingsCache')) {
    function forgetSettingsCache(): void
    {
        \Illuminate\Support\Facades\Cache::forget('settings.all');
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile(?string $path): void
    {
        if ($path) {
            $fullPath = public_path(ltrim($path, '/'));
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }
    }
}
