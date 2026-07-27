<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Message;
use App\Models\PageView;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function dashboard()
    {
        $visitorsWeek = PageView::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $visitorsLastWeek = PageView::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        $visitorsChange = $visitorsLastWeek > 0 ? round((($visitorsWeek - $visitorsLastWeek) / $visitorsLastWeek) * 100) : 0;

        $stats = [
            'projects' => Project::count(),
            'services' => Service::count(),
            'faqs' => Faq::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'visitors_today' => PageView::whereDate('created_at', today())->count(),
            'visitors_week' => $visitorsWeek,
            'visitors_total' => PageView::count(),
            'testimonials' => Testimonial::count(),
            'visitors_change' => $visitorsChange,
        ];

        $chartData = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartData->push([
                'date' => $date->format('Y-m-d'),
                'visitors' => PageView::whereDate('created_at', $date)->count(),
            ]);
        }

        $deviceData = PageView::selectRaw('device_type, COUNT(*) as total')
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        $topPages = PageView::selectRaw('page_url, COUNT(*) as total')
            ->groupBy('page_url')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $recentMessages = Message::latest()->take(5)->get();

        $latestProjects = Project::with('category')->latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'stats', 'chartData', 'deviceData', 'topPages', 'recentMessages', 'latestProjects'
        ));
    }
}
