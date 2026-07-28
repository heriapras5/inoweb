<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\PageView;
use App\Models\Project;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->startOfDay();
        $yesterday = now()->subDay()->startOfDay();

        // ─── Period Counts ───
        $visitorsToday = PageView::whereDate('created_at', $today)->count();
        $visitorsYesterday = PageView::whereDate('created_at', $yesterday)->count();
        $visitorsWeek = PageView::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $visitorsMonth = PageView::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count();
        $visitorsYear = PageView::whereYear('created_at', now()->year)->count();
        $visitorsTotal = PageView::count();
        $uniqueTotal = PageView::distinct('ip_address')->count('ip_address');

        // ─── % Change ───
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
            'projects' => Project::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'testimonials' => Testimonial::count(),
        ];

        // ─── Chart: 30 Hari (default) ───
        $dailyData = collect();
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dailyData->push([
                'label' => $date->format('d/m'),
                'value' => PageView::whereDate('created_at', $date)->count(),
            ]);
        }

        // ─── Chart: 12 Minggu ───
        $weeklyData = collect();
        for ($i = 11; $i >= 0; $i--) {
            $weekStart = now()->subWeeks($i)->startOfWeek();
            $weekEnd = now()->subWeeks($i)->endOfWeek();
            $weeklyData->push([
                'label' => 'Minggu ' . $weekStart->isoFormat('DD/MM'),
                'value' => PageView::whereBetween('created_at', [$weekStart, $weekEnd])->count(),
            ]);
        }

        // ─── Chart: 12 Bulan ───
        $monthlyData = collect();
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyData->push([
                'label' => $date->isoFormat('MMM YY'),
                'value' => PageView::whereYear('created_at', $date->year)->whereMonth('created_at', $date->month)->count(),
            ]);
        }

        // ─── Chart: 5 Tahun ───
        $yearlyData = collect();
        for ($i = 4; $i >= 0; $i--) {
            $year = now()->subYears($i)->year;
            $yearlyData->push([
                'label' => (string) $year,
                'value' => PageView::whereYear('created_at', $year)->count(),
            ]);
        }

        // ─── Top Pages ───
        $topPages = PageView::selectRaw('page_url, COUNT(*) as total')
            ->groupBy('page_url')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
        $topPagesTotal = $topPages->sum('total');

        // ─── Device ───
        $deviceData = PageView::selectRaw('device_type, COUNT(*) as total')
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        // ─── Recent ───
        $recentMessages = Message::latest()->take(5)->get();
        $latestProjects = Project::with('category')->latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totals', 'dailyData', 'weeklyData', 'monthlyData', 'yearlyData',
            'topPages', 'topPagesTotal', 'deviceData', 'recentMessages', 'latestProjects'
        ));
    }
}
