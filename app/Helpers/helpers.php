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
        // Normalisasi spasi non-breaking Summernote agar paragraf
        // "kosong" seperti <p>&nbsp;</p> ikut terbuang di bawah.
        $html = preg_replace('/&nbsp;|&#160;/i', ' ', $html);
        $html = preg_replace('/\s+(?:style|dir|id|class|data-[a-z0-9-]+|on[a-z]+)="[^"]*"/i', '', $html);
        $html = preg_replace("/\s+(?:style|dir|id|class|data-[a-z0-9-]+|on[a-z]+)='[^']*'/i", '', $html);

        for ($i = 0; $i < 3; $i++) {
            $html = preg_replace('/<(p|div|span|b|strong|h1|h2|h3|h4|ul|ol)[^>]*>\s*(?:<br\s*\/?>\s*)*<\/\1>/i', '', $html);
        }
        $html = preg_replace('/(<br\s*\/?>\s*){2,}/i', '<br>', $html);

        return trim($html);
    }
}

if (!function_exists('isEmptyRichText')) {
    /**
     * Cek apakah HTML dari editor rich text secara visual kosong.
     * Summernote sering mengirim '<p><br></p>' saat editor dibiarkan kosong,
     * yang tetap lolos validasi 'required|string' biasa.
     */
    function isEmptyRichText(?string $html): bool
    {
        if ($html === null || trim($html) === '') {
            return true;
        }

        $text = preg_replace('/&nbsp;|&#160;|&zwnj;/i', ' ', $html);
        if (trim(strip_tags((string) $text)) !== '') {
            return false;
        }

        // Tanpa teks, tapi konten visual (gambar/embed/tabel/hr) tetap dianggap terisi.
        return !preg_match('/<(img|iframe|video|table|hr)\b/i', $html);
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

if (!function_exists('organizationJsonLd')) {
    // JSON-LD Organization+WebSite untuk <head> frontend.
    // WAJIB di sini (file PHP murni), bukan inline di Blade: string '@context'
    // akan dikompilasi Blade sebagai direktif @context (CompilesContexts)
    // sehingga output JSON rusak bila ditulis langsung di template.
    function organizationJsonLd(): string
    {
        $sameAs = array_values(array_filter([
            setting('social_facebook', ''),
            setting('social_instagram', ''),
            setting('social_linkedin', ''),
            setting('social_youtube', ''),
        ]));
        $org = [
            '@type' => 'Organization',
            '@id' => url('/') . '#organization',
            'name' => setting('site_name', 'INOWEB'),
            'url' => url('/'),
            'description' => setting('site_description', 'INOWEB - Inovasi Website. Solusi website modern, cepat, dan mudah dikelola untuk bisnis Anda.'),
            'logo' => setting('logo_image') ? url(setting('logo_image')) : '',
            'sameAs' => $sameAs,
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+' . setting('whatsapp_number', '6285736186308'),
                'contactType' => 'customer service',
            ],
        ];
        $web = [
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'url' => url('/'),
            'name' => setting('site_name', 'INOWEB'),
            'inLanguage' => 'id-ID',
            'publisher' => ['@id' => url('/') . '#organization'],
        ];

        return (string) json_encode(
            ['@context' => 'https://schema.org', '@graph' => [$org, $web]],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
    }
}
