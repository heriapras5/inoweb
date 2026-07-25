<?php

namespace App\Http\Controllers;

use App\Services\Frontend\FrontendService;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct(
        protected FrontendService $frontendService,
    ) {}

    public function home()
    {
        $projects = $this->frontendService->getFeaturedProjects(6);
        $services = $this->frontendService->getServices();
        $testimonials = $this->frontendService->getTestimonials();
        return view('frontend.home', compact('projects', 'services', 'testimonials'));
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
        $relatedProjects = $this->frontendService->getRelatedProjects($project->id, $project->category_id, 3);
        return view('frontend.detail-project', compact('project', 'relatedProjects'));
    }

    public function services()
    {
        $services = $this->frontendService->getServices();
        return view('frontend.services', compact('services'));
    }

    public function about()
    {
        return view('frontend.about');
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
