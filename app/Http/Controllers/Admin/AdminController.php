<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\BuildsPageStats;
use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    use BuildsPageStats;

    public function dashboard()
    {
        // Render awal ringan: hanya periode default (Harian = hari ini).
        // Ganti periode memanggil endpoint JSON dashboard.data via AJAX.
        [$from, $to, $granularity] = $this->resolveRange('daily', null, null);

        $cacheKey = 'admin.dashboard.' . now()->format('YmdHi');
        $payload = Cache::remember($cacheKey, 60, function () use ($from, $to, $granularity) {
            return $this->dashboardPayload($from, $to, $granularity, 'daily');
        });

        $latestMessages = Cache::remember('admin.latestMessages', 60, function () {
            return \App\Models\Message::latest()->take(5)->get();
        });

        return view('admin.dashboard', array_merge($payload, [
            'period' => 'daily',
            'dataUrl' => route('admin.dashboard.data'),
            'todayInput' => Carbon::now('Asia/Jakarta')->toDateString(),
            'latestMessages' => $latestMessages,
            'contentSummary' => $this->contentSummary(),
            'totalMessages' => \App\Models\Message::count(),
            'unreadMessages' => \App\Models\Message::where('is_read', false)->count(),
        ]));
    }

    /**
     * Endpoint JSON untuk filter periode (pola juneo-phone: index SSR + data AJAX).
     * GET /admin/dashboard/data?period=daily|weekly|monthly|yearly&from=Y-m-d&to=Y-m-d
     * Bila from/to diisi lengkap, rentang kustom mengalahkan period.
     */
    public function data(Request $request)
    {
        $validated = $request->validate([
            'period' => 'nullable|in:daily,weekly,monthly,yearly',
            'from' => 'nullable|date_format:Y-m-d',
            'to' => 'nullable|date_format:Y-m-d|after_or_equal:from',
        ]);

        $hasFrom = ! empty($validated['from']);
        $hasTo = ! empty($validated['to']);

        if ($hasFrom !== $hasTo) {
            return response()->json(['message' => 'Tanggal mulai dan selesai harus diisi bersamaan.'], 422);
        }

        [$from, $to, $granularity, $period, $isCustom] = $this->resolveRange(
            $validated['period'] ?? null,
            $validated['from'] ?? null,
            $validated['to'] ?? null
        );

        // Jangan izinkan rentang ke masa depan: clamp ke akhir hari ini (WIB).
        $todayEnd = Carbon::now('Asia/Jakarta')->endOfDay();
        if ($to->greaterThan($todayEnd)) {
            $to = $todayEnd;
            if ($isCustom) {
                $granularity = $this->granularityForRange($from, $to);
            }
        }

        // Batasi custom maks 366 hari agar COUNT DISTINCT per bucket tetap ringan.
        if ($from->diffInDays($to) > 365) {
            return response()->json(['message' => 'Rentang tanggal maksimal 366 hari.'], 422);
        }

        $cacheKey = sprintf(
            'admin.dashboard.data.%s.%s.%s.%s',
            $period,
            $from->format('YmdHi'),
            $to->format('YmdHi'),
            $granularity
        );

        // Toleransi basi 60 detik seperti cache SSR: kunjungan ditulis tiap hit,
        // real-time penuh tidak diperlukan dan agregat DISTINCT itu mahal.
        $payload = Cache::remember($cacheKey, 60, function () use ($from, $to, $granularity, $period) {
            return $this->dashboardPayload($from, $to, $granularity, $period);
        });

        return response()->json(array_merge($payload, [
            'period' => $period,
            'granularity' => $granularity,
            'isCustom' => $isCustom,
            'from' => $from->toDateString(),
            'to' => $to->toDateString(),
        ]));
    }

    /**
     * Tentukan rentang kalender berjalan (pola deriveDateRange juneo-phone).
     * daily = hari ini, weekly = Senin-Minggu ini, monthly = bulan ini,
     * yearly = tahun ini. Custom (from/to) menentukan granularitas otomatis.
     *
     * @return array{Carbon, Carbon, string, string, bool} [$from, $to, $granularity, $period, $isCustom]
     */
    protected function resolveRange(?string $period, ?string $fromInput, ?string $toInput): array
    {
        // Zona eksplisit WIB agar batas hari/minggu sesuai waktu Indonesia.
        // created_at tersimpan UTC sehingga ada skew maks +-7 jam di bucket
        // tengah malam; diterima agar index created_at tetap terpakai.
        if ($fromInput && $toInput) {
            $from = Carbon::parse($fromInput, 'Asia/Jakarta')->startOfDay();
            $to = Carbon::parse($toInput, 'Asia/Jakarta')->endOfDay();

            return [$from, $to, $this->granularityForRange($from, $to), 'custom', true];
        }

        $now = Carbon::now('Asia/Jakarta');
        $key = $period ?: 'daily';
        $granularity = 'day';

        switch ($key) {
            case 'weekly':
                $from = $now->copy()->startOfWeek(Carbon::MONDAY);
                $to = $now->copy()->endOfWeek(Carbon::SUNDAY);
                break;
            case 'monthly':
                $from = $now->copy()->startOfMonth();
                $to = $now->copy()->endOfMonth();
                break;
            case 'yearly':
                $from = $now->copy()->startOfYear();
                $to = $now->copy()->endOfYear();
                $granularity = 'month';
                break;
            case 'daily':
            default:
                $key = 'daily';
                $from = $now->copy()->startOfDay();
                $to = $now->copy()->endOfDay();
                $granularity = 'hour';
                break;
        }

        return [$from, $to, $granularity, $key, false];
    }

    /**
     * Granularitas otomatis untuk rentang kustom (aturan juneo-phone).
     */
    protected function granularityForRange(Carbon $from, Carbon $to): string
    {
        $days = $from->diffInDays($to) + 1;
        if ($days <= 2) {
            return 'hour';
        }
        if ($days <= 31) {
            return 'day';
        }
        if ($days <= 92) {
            return 'week';
        }

        return 'month';
    }

    /**
     * Satu paket statistik untuk satu rentang: KPI, seri chart, halaman top.
     * Dipakai SSR dashboard() dan endpoint JSON data() agar satu suara.
     */
    protected function dashboardPayload(Carbon $from, Carbon $to, string $granularity, string $period): array
    {
        return [
            'stats' => $this->statsForWindow($from, $to),
            'series' => $this->seriesForRange($from, $to, $granularity),
            'topPages' => $this->topPages($from, 6, $to),
            'portfolioTop' => $this->portfolioPages($from, 5, $to),
            'meta' => $this->periodMetaForRange($from, $to, $granularity, $period),
        ];
    }

    /**
     * KPI satu window dibanding window sebelumnya dengan durasi sama.
     */
    protected function statsForWindow(Carbon $from, Carbon $to): array
    {
        $current = $this->windowCounts($from, $to);
        [$prevFrom, $prevTo] = $this->prevWindow($from, $to);
        $previous = $this->windowCounts($prevFrom, $prevTo);

        return [
            'visits' => $current['total'],
            'visitsChange' => $this->changePct($current['total'], $previous['total']),
            'unique' => $current['unique'],
            'portfolio' => $current['portfolio'],
            'portfolioChange' => $this->changePct($current['portfolio'], $previous['portfolio']),
            'share' => $this->sharePct($current['portfolio'], $current['total']),
        ];
    }

    /**
     * Window pembanding: durasi sama tepat sebelum $from.
     */
    protected function prevWindow(Carbon $from, Carbon $to): array
    {
        $days = $from->diffInDays($to) + 1;
        $prevTo = $from->copy()->subDay()->endOfDay();
        $prevFrom = $prevTo->copy()->subDays($days - 1)->startOfDay();

        return [$prevFrom, $prevTo];
    }

    protected function changePct(int $current, int $prev): int|float
    {
        return $prev > 0 ? round((($current - $prev) / $prev) * 100, 1) : ($current > 0 ? 100 : 0);
    }

    protected function sharePct(int $part, int $whole): int|float
    {
        return $whole > 0 ? round($part / $whole * 100) : 0;
    }

    protected function periodMetaForRange(Carbon $from, Carbon $to, string $granularity, string $period): array
    {
        if ($from->toDateString() === $to->toDateString()) {
            $range = $from->translatedFormat('l, d F Y');
        } elseif ($granularity === 'month') {
            $range = $from->translatedFormat('M Y') . ' - ' . $to->translatedFormat('M Y');
        } else {
            $range = $from->translatedFormat('d M') . ' - ' . $to->translatedFormat('d M Y');
        }

        $note = match ($period) {
            'daily' => 'Laporan harian, agregat per jam',
            'weekly' => 'Laporan minggu berjalan, agregat harian',
            'monthly' => 'Laporan bulan berjalan, agregat harian',
            'yearly' => 'Laporan tahun berjalan, agregat bulanan',
            default => 'Laporan kustom, agregat per ' . match ($granularity) {
                'hour' => 'jam',
                'week' => 'minggu',
                'month' => 'bulan',
                default => 'hari',
            },
        };

        return ['range' => $range, 'note' => $note];
    }

    protected function seriesForRange(Carbon $from, Carbon $to, string $granularity): array
    {
        return match ($granularity) {
            'hour' => $this->seriesHourly($from, $to),
            'week' => $this->seriesWeeklyRange($from, $to),
            'month' => $this->seriesMonthlyRange($from, $to),
            default => $this->seriesDailyRange($from, $to),
        };
    }

    protected function seriesHourly(Carbon $from, Carbon $to): array
    {
        $multiDay = $from->toDateString() !== $to->toDateString();
        $labels = [];
        $keys = [];
        $cursor = $from->copy()->startOfDay();
        $end = $to->copy()->startOfDay();
        while ($cursor <= $end) {
            for ($h = 0; $h < 24; $h++) {
                $hourLabel = sprintf('%02d:00', $h);
                $labels[] = $multiDay ? $cursor->translatedFormat('d/M') . ' ' . $hourLabel : $hourLabel;
                $keys[] = $cursor->format('Y-m-d') . ' ' . $hourLabel;
            }
            $cursor->addDay();
        }

        return $this->combinedSeries(
            "DATE_FORMAT(created_at, '%Y-%m-%d %H:00')",
            $from,
            $labels,
            $keys,
            $to
        );
    }

    protected function seriesDailyRange(Carbon $from, Carbon $to): array
    {
        $labels = [];
        $keys = [];
        $cursor = $from->copy()->startOfDay();
        $end = $to->copy()->startOfDay();
        while ($cursor <= $end) {
            $labels[] = $cursor->translatedFormat('d M');
            $keys[] = $cursor->toDateString();
            $cursor->addDay();
        }

        return $this->combinedSeries('DATE(created_at)', $from, $labels, $keys, $to);
    }

    protected function seriesWeeklyRange(Carbon $from, Carbon $to): array
    {
        // Bucket Senin-Minggu (ISO-8601), konsisten dengan YEARWEEK(..., 3)
        // dan startOfWeek(MONDAY). Jangan ganti mode YEARWEEK sembarangan.
        $labels = [];
        $keys = [];
        $cursor = $from->copy()->startOfWeek(Carbon::MONDAY);
        while ($cursor <= $to) {
            $weekEnd = $cursor->copy()->endOfWeek(Carbon::SUNDAY);
            $labels[] = $cursor->translatedFormat('d M') . ' - ' . $weekEnd->translatedFormat('d M');
            $keys[] = $cursor->format('oW');
            $cursor->addWeek();
        }

        return $this->combinedSeries('YEARWEEK(created_at, 3)', $from, $labels, $keys, $to);
    }

    protected function seriesMonthlyRange(Carbon $from, Carbon $to): array
    {
        $labels = [];
        $keys = [];
        $cursor = $from->copy()->startOfMonth();
        $end = $to->copy()->startOfMonth();
        while ($cursor <= $end) {
            $labels[] = $cursor->isoFormat('MMM YY');
            $keys[] = $cursor->format('Y-m');
            $cursor->addMonthNoOverflow();
        }

        return $this->combinedSeries("DATE_FORMAT(created_at, '%Y-%m')", $from, $labels, $keys, $to);
    }

    /**
     * Total, portofolio, dan pengunjung unik dalam satu query untuk satu rentang.
     */
    protected function windowCounts(Carbon $from, ?Carbon $to = null): array
    {
        $row = PageView::query()
            ->where('created_at', '>=', $from)
            ->when($to !== null, fn ($q) => $q->where('created_at', '<=', $to))
            ->selectRaw("COUNT(*) as total, COUNT(DISTINCT ip_address) as unique_visitors, COALESCE(SUM(CASE WHEN page_path LIKE 'portfolio%' THEN 1 ELSE 0 END), 0) as portfolio")
            ->first();

        return [
            'total' => (int) $row->total,
            'unique' => (int) $row->unique_visitors,
            'portfolio' => (int) $row->portfolio,
        ];
    }

    /**
     * Seri teragregasi per bucket waktu; satu query menghasilkan ketiga garis
     * sparkline (total, unik, portofolio), tanpa N+1 per titik.
     * Bucket kosong diisi 0 via $keys agar garis chart tidak bolong.
     */
    protected function combinedSeries(string $expression, Carbon $from, array $labels, array $keys, ?Carbon $to = null): array
    {
        $rows = PageView::query()
            ->where('created_at', '>=', $from)
            ->when($to !== null, fn ($q) => $q->where('created_at', '<=', $to))
            ->selectRaw("{$expression} as bucket, COUNT(*) as total, COUNT(DISTINCT ip_address) as unique_visitors, COALESCE(SUM(CASE WHEN page_path LIKE 'portfolio%' THEN 1 ELSE 0 END), 0) as portfolio")
            ->groupBy('bucket')
            ->get()
            ->keyBy('bucket');

        $total = [];
        $unique = [];
        $portfolio = [];
        foreach ($keys as $key) {
            // YEARWEEK dari MySQL berupa integer (mis. 202540) sementara key
            // PHP format('oW') berupa string; samakan tipe agar bucket mingguan match.
            $row = $rows[$key] ?? $rows->get(is_numeric($key) ? (int) $key : (string) $key);
            $total[] = (int) ($row->total ?? 0);
            $unique[] = (int) ($row->unique_visitors ?? 0);
            $portfolio[] = (int) ($row->portfolio ?? 0);
        }

        return ['labels' => $labels, 'total' => $total, 'unique' => $unique, 'portfolio' => $portfolio];
    }

    protected function contentSummary(): array
    {
        return [
            ['label' => 'Projek', 'count' => \App\Models\Project::count(), 'route' => route('admin.projects.index'), 'icon' => 'folder', 'colors' => ['bg' => 'from-blue-500 to-blue-600', 'iconBg' => 'bg-blue-50', 'iconText' => 'text-blue-600']],
            ['label' => 'Kategori Projek', 'count' => \App\Models\ProjectCategory::count(), 'route' => route('admin.project-categories.index'), 'icon' => 'tag', 'colors' => ['bg' => 'from-indigo-500 to-indigo-600', 'iconBg' => 'bg-indigo-50', 'iconText' => 'text-indigo-600']],
            ['label' => 'Layanan', 'count' => \App\Models\Service::count(), 'route' => route('admin.services.index'), 'icon' => 'grid', 'colors' => ['bg' => 'from-emerald-500 to-emerald-600', 'iconBg' => 'bg-emerald-50', 'iconText' => 'text-emerald-600']],
            ['label' => 'FAQ', 'count' => \App\Models\Faq::count(), 'route' => route('admin.faqs.index'), 'icon' => 'help', 'colors' => ['bg' => 'from-amber-500 to-amber-600', 'iconBg' => 'bg-amber-50', 'iconText' => 'text-amber-600']],
            ['label' => 'Testimoni', 'count' => \App\Models\Testimonial::count(), 'route' => route('admin.testimonials.index'), 'icon' => 'message', 'colors' => ['bg' => 'from-rose-500 to-rose-600', 'iconBg' => 'bg-rose-50', 'iconText' => 'text-rose-600']],
            ['label' => 'Pesan Masuk', 'count' => \App\Models\Message::count(), 'route' => route('admin.messages.index'), 'icon' => 'mail', 'colors' => ['bg' => 'from-slate-500 to-slate-600', 'iconBg' => 'bg-slate-100', 'iconText' => 'text-slate-600']],
        ];
    }
}
