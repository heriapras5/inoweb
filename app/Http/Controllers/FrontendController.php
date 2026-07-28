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
        return view('frontend.home', compact('heroSections', 'aboutSection', 'projects', 'services', 'faqs', 'categories'));
    }

    public function portfolio()
    {
        $projects = $this->frontendService->getProjects();
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

    public function subscribeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter,email',
        ]);
        $this->frontendService->subscribeNewsletter($validated['email']);
        return back()->with('success', 'Berlangganan newsletter berhasil!');
    }
}
