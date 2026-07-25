<?php

if (!function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        static $cache = null;
        if ($cache === null) {
            $cache = \App\Models\Setting::pluck('value', 'key')->toArray();
        }
        return $cache[$key] ?? $default;
    }
}
