<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Services\Frontend\FrontendService;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct(
        protected FrontendService $frontendService,
    ) {}

    public function home()
    {
        $heroSections = HeroSection::where('is_active', true)->orderBy('sort_order')->get();
        $aboutSection = AboutSection::where('is_active', true)->first();
        $projects = $this->frontendService->getProjects(6);
        $categories = $this->frontendService->getProjectCategories();
        $services = $this->frontendService->getServices();
        $faqs = $this->frontendService->getFaqs();
        $testimonials = $this->frontendService->getTestimonials();
        return view('frontend.home', compact('heroSections', 'aboutSection', 'projects', 'services', 'faqs', 'categories', 'testimonials'));
    }

    public function portfolio()
    {
        $projects = $this->frontendService->getProjectsPaginated(12);
        $categories = $this->frontendService->getProjectCategories();
        return view('frontend.portfolio', compact('projects', 'categories'));
    }

    public function portfolioDetail($slug)
    {
        $project = $this->frontendService->getProjectBySlug($slug);
        if (!$project) {
            abort(404);
        }
        $prevProject = $this->frontendService->getPrevProject($project->id);
        $nextProject = $this->frontendService->getNextProject($project->id);
        $pagination = $this->frontendService->getProjectPagination($project->id);
        return view('frontend.detail-project', compact('project', 'prevProject', 'nextProject', 'pagination'));
    }

    public function services()
    {
        $services = $this->frontendService->getServices();
        return view('frontend.services', compact('services'));
    }

    public function about()
    {
        $aboutSection = AboutSection::where('is_active', true)->first() ?? new AboutSection();
        return view('frontend.about', compact('aboutSection'));
    }

    public function faq()
    {
        $faqs = $this->frontendService->getFaqs();
        return view('frontend.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function favicon()
    {
        $logo = setting('favicon') ?: setting('logo_image');

        if ($logo) {
            $src = asset($logo);
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">'
                . '<defs><clipPath id="c"><circle cx="32" cy="32" r="32"/></clipPath></defs>'
                . '<circle cx="32" cy="32" r="32" fill="#2563eb"/>'
                . '<image href="' . e($src) . '" width="64" height="64" preserveAspectRatio="xMidYMid slice" clip-path="url(#c)"/>'
                . '</svg>';
        } else {
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">'
                . '<circle cx="16" cy="16" r="16" fill="#2563eb"/>'
                . '<rect x="6" y="7" width="20" height="14" rx="2.5" fill="#ffffff"/>'
                . '<rect x="12" y="21" width="8" height="3" fill="#ffffff"/>'
                . '<rect x="14" y="24" width="4" height="3" fill="#ffffff"/>'
                . '</svg>';
        }

        return response($svg, 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        $this->frontendService->submitContact($validated);
        return back()->with('success', 'Pesan berhasil dikirim. Kami akan menghubungi Anda segera.');
    }
}
