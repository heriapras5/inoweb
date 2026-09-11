<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $q = trim($request->get('q', ''));
        $results = [];

        if ($q !== '') {
            $like = "%{$q}%";
            $results = [
                'services' => \App\Models\Service::where('title', 'like', $like)->take(5)->get(),
                'projects' => \App\Models\Project::where('name', 'like', $like)->take(5)->get(),
                'faqs' => \App\Models\Faq::where('question', 'like', $like)->take(5)->get(),
                'testimonials' => \App\Models\Testimonial::where('name', 'like', $like)->take(5)->get(),
                'banners' => \App\Models\Banner::where('title', 'like', $like)->take(5)->get(),
                'clients' => \App\Models\Client::where('name', 'like', $like)->take(5)->get(),
                'partners' => \App\Models\Partner::where('name', 'like', $like)->take(5)->get(),
                'messages' => \App\Models\Message::where('name', 'like', $like)->orWhere('subject', 'like', $like)->take(5)->get(),
            ];

            if (auth()->user()?->isSuperAdmin()) {
                $results['users'] = \App\Models\User::where('name', 'like', $like)->orWhere('email', 'like', $like)->take(5)->get();
            }
        }

        return view('admin.search', compact('results', 'q'));
    }
}
