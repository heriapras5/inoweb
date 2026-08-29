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

if (!function_exists('cleanRichText')) {
    function cleanRichText(?string $html): string
    {
        if (!$html) {
            return '';
        }
        $html = preg_replace('/\s+(?:style|dir)="[^"]*"/i', '', $html);
        $html = preg_replace("/\s+(?:style|dir)='[^']*'/i", '', $html);
        return $html;
    }
}

if (!function_exists('optimizeImage')) {
    function optimizeImage(?string $path, int $maxDim = 1600, int $quality = 82): void
    {
        if (!$path) {
            return;
        }
        $fullPath = public_path(ltrim($path, '/'));
        if (!is_file($fullPath)) {
            return;
        }
        $info = @getimagesize($fullPath);
        if (!$info) {
            return;
        }
        [$w, $h] = [$info[0], $info[1]];
        $mime = $info['mime'] ?? '';

        if ($w <= $maxDim && filesize($fullPath) <= 220 * 1024) {
            return;
        }

        $src = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($fullPath),
            'image/png' => @imagecreatefrompng($fullPath),
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($fullPath) : false,
            default => false,
        };
        if (!$src) {
            return;
        }

        $scale = min(1, $maxDim / max($w, $h));
        $nw = max(1, (int) round($w * $scale));
        $nh = max(1, (int) round($h * $scale));

        $dst = $src;
        if ($scale < 1) {
            $dst = imagecreatetruecolor($nw, $nh);
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
        }

        if ($mime === 'image/jpeg') {
            imagejpeg($dst, $fullPath, $quality);
        } elseif ($mime === 'image/png') {
            imagepng($dst, $fullPath, 6);
        } elseif ($mime === 'image/webp' && function_exists('imagewebp')) {
            imagewebp($dst, $fullPath, $quality);
        }

        imagedestroy($src);
        if ($dst !== $src) {
            imagedestroy($dst);
        }
    }
}
