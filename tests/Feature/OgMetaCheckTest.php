<?php

namespace Tests\Feature;

use App\Models\AboutSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OgMetaCheckTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_has_absolute_og_image(): void
    {
        AboutSection::create(['title' => 'Tentang Kami', 'description' => 'Deskripsi tentang kami.', 'is_active' => true]);

        $response = $this->get('/');
        $response->assertOk();

        $html = $response->getContent();
        $this->assertMatchesRegularExpression(
            '#<meta property="og:image" content="https?://[^"]+">#',
            $html,
            'Homepage must render an absolute og:image URL'
        );
        $this->assertMatchesRegularExpression(
            '#<meta property="og:image:secure_url" content="https?://[^"]+">#',
            $html,
            'Homepage must render an absolute og:image:secure_url'
        );
    }

    public function test_og_image_endpoint_returns_valid_png_with_real_dimensions(): void
    {
        $response = $this->get('/og-image.png');
        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/png');

        $info = @getimagesizefromstring($response->getContent());
        $this->assertNotFalse($info, 'og-image endpoint must return a valid image');

        $this->assertSame(1200, $info[0], 'og:image width must match declared 1200');
        $this->assertSame(630, $info[1], 'og:image height must match declared 630');
    }
}
