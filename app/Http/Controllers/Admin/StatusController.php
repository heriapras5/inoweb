<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected array $map = [
        'hero_sections' => [\App\Models\HeroSection::class, 'status'],
        'services' => [\App\Models\Service::class, 'status'],
        'projects' => [\App\Models\Project::class, 'status'],
        'project_categories' => [\App\Models\ProjectCategory::class, 'status'],
        'faqs' => [\App\Models\Faq::class, 'status'],
        'testimonials' => [\App\Models\Testimonial::class, 'status'],
        'banners' => [\App\Models\Banner::class, 'is_active'],
        'clients' => [\App\Models\Client::class, 'status'],
        'partners' => [\App\Models\Partner::class, 'status'],
        'menus' => [\App\Models\Menu::class, 'status'],
        'contact_info' => [\App\Models\ContactInfo::class, 'status'],
        'cta_sections' => [\App\Models\CtaSection::class, 'is_active'],
        'about_sections' => [\App\Models\AboutSection::class, 'is_active'],
    ];

    public function toggle(Request $request)
    {
        $data = $request->validate([
            'resource' => 'required|string',
            'id' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        if (! isset($this->map[$data['resource']])) {
            return response()->json(['success' => false, 'message' => 'Resource tidak dikenal.'], 422);
        }

        [$model, $column] = $this->map[$data['resource']];
        $item = $model::find($data['id']);
        if (! $item) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.'], 404);
        }

        $item->update([$column => (bool) $data['status']]);

        return response()->json(['success' => true]);
    }
}
