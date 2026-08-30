<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function dashboard()
    {
        $cacheKey = 'admin.dashboard.' . now()->format('YmdHi');
        $stats = Cache::remember($cacheKey, 60, function () {
            return $this->buildStats();
        });

        $latestMessages = Cache::remember('admin.latestMessages', 60, function () {
            return \App\Models\Message::latest()->take(5)->get();
        });

        return view('admin.dashboard', array_merge($stats, [
            'latestMessages' => $latestMessages,
        ]));
    }

    protected function buildStats(): array
    {
        $today = now()->startOfDay();
        $yesterday = now()->subDay()->startOfDay();

        $visitorsToday = PageView::whereDate('created_at', $today)->count();
        $visitorsYesterday = PageView::whereDate('created_at', $yesterday)->count();
        $visitorsWeek = PageView::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $visitorsMonth = PageView::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count();
        $visitorsYear = PageView::whereYear('created_at', now()->year)->count();
        $visitorsTotal = PageView::count();
        $uniqueTotal = PageView::distinct('ip_address')->count('ip_address');

        $yesterdayChange = $visitorsYesterday > 0 ? round((($visitorsToday - $visitorsYesterday) / $visitorsYesterday) * 100) : ($visitorsToday > 0 ? 100 : 0);
        $lastWeek = PageView::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        $weekChange = $lastWeek > 0 ? round((($visitorsWeek - $lastWeek) / $lastWeek) * 100) : ($visitorsWeek > 0 ? 100 : 0);
        $lastMonth = PageView::whereYear('created_at', now()->subMonth()->year)->whereMonth('created_at', now()->subMonth()->month)->count();
        $monthChange = $lastMonth > 0 ? round((($visitorsMonth - $lastMonth) / $lastMonth) * 100) : ($visitorsMonth > 0 ? 100 : 0);
        $lastYear = PageView::whereYear('created_at', now()->subYear()->year)->count();
        $yearChange = $lastYear > 0 ? round((($visitorsYear - $lastYear) / $lastYear) * 100) : ($visitorsYear > 0 ? 100 : 0);

        $totals = [
            'visitors_today' => $visitorsToday,
            'visitors_yesterday' => $visitorsYesterday,
            'visitors_week' => $visitorsWeek,
            'visitors_month' => $visitorsMonth,
            'visitors_year' => $visitorsYear,
            'visitors_total' => $visitorsTotal,
            'unique_total' => $uniqueTotal,
            'yesterday_change' => $yesterdayChange,
            'week_change' => $weekChange,
            'month_change' => $monthChange,
            'year_change' => $yearChange,
            'last_week' => $lastWeek,
            'last_month' => $lastMonth,
            'last_year' => $lastYear,
        ];

        $dailyData = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dailyData->push([
                'label' => $date->format('d/m'),
                'value' => PageView::whereDate('created_at', $date)->count(),
            ]);
        }

        $weeklyData = collect();
        for ($i = 11; $i >= 0; $i--) {
            $weekStart = now()->subWeeks($i)->startOfWeek();
            $weekEnd = now()->subWeeks($i)->endOfWeek();
            $weeklyData->push([
                'label' => 'Minggu ' . $weekStart->isoFormat('DD/MM'),
                'value' => PageView::whereBetween('created_at', [$weekStart, $weekEnd])->count(),
            ]);
        }

        $monthlyData = collect();
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyData->push([
                'label' => $date->isoFormat('MMM YY'),
                'value' => PageView::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->count(),
            ]);
        }

        $yearlyData = collect();
        for ($i = 4; $i >= 0; $i--) {
            $year = now()->subYears($i)->year;
            $yearlyData->push([
                'label' => (string) $year,
                'value' => PageView::whereYear('created_at', $year)->count(),
            ]);
        }

        $deviceData = PageView::selectRaw('device_type, COUNT(*) as total')
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get()
            ->map(fn($d) => [
                'type' => $d->device_type ?: 'unknown',
                'total' => $d->total,
            ]);

        $dailyAvg = $dailyData->count() > 0 ? round($dailyData->avg('value')) : 0;
        $dailyPeak = $dailyData->sortByDesc('value')->first();

        $contentSummary = [
            ['label' => 'Projek', 'count' => \App\Models\Project::count(), 'route' => route('admin.projects.index'), 'icon' => 'folder', 'colors' => ['bg' => 'from-blue-500 to-blue-600', 'iconBg' => 'bg-blue-50', 'iconText' => 'text-blue-600']],
            ['label' => 'Kategori Projek', 'count' => \App\Models\ProjectCategory::count(), 'route' => route('admin.project-categories.index'), 'icon' => 'tag', 'colors' => ['bg' => 'from-indigo-500 to-indigo-600', 'iconBg' => 'bg-indigo-50', 'iconText' => 'text-indigo-600']],
            ['label' => 'Layanan', 'count' => \App\Models\Service::count(), 'route' => route('admin.services.index'), 'icon' => 'grid', 'colors' => ['bg' => 'from-emerald-500 to-emerald-600', 'iconBg' => 'bg-emerald-50', 'iconText' => 'text-emerald-600']],
            ['label' => 'FAQ', 'count' => \App\Models\Faq::count(), 'route' => route('admin.faqs.index'), 'icon' => 'help', 'colors' => ['bg' => 'from-amber-500 to-amber-600', 'iconBg' => 'bg-amber-50', 'iconText' => 'text-amber-600']],
            ['label' => 'Testimoni', 'count' => \App\Models\Testimonial::count(), 'route' => route('admin.testimonials.index'), 'icon' => 'message', 'colors' => ['bg' => 'from-rose-500 to-rose-600', 'iconBg' => 'bg-rose-50', 'iconText' => 'text-rose-600']],
            ['label' => 'Pesan Masuk', 'count' => \App\Models\Message::count(), 'route' => route('admin.messages.index'), 'icon' => 'mail', 'colors' => ['bg' => 'from-slate-500 to-slate-600', 'iconBg' => 'bg-slate-100', 'iconText' => 'text-slate-600']],
        ];
        $totalMessages = \App\Models\Message::count();
        $unreadMessages = \App\Models\Message::where('is_read', false)->count();

        return compact(
            'totals', 'dailyData', 'weeklyData', 'monthlyData', 'yearlyData',
            'deviceData', 'dailyAvg', 'dailyPeak',
            'contentSummary', 'totalMessages', 'unreadMessages'
        );
    }
}
