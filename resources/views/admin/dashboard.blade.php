@extends('admin.layouts.app')
@section('title', 'Dashboard')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush
@section('content')

<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#1e293b]">Dashboard Visitor</h1>
            <p class="text-sm text-[#64748b] mt-1">Selamat datang kembali, <span class="font-medium text-[#1e293b]">{{ auth()->user()->name }}</span></p>
        </div>
        <div class="text-right text-xs text-[#94a3b8]">{{ now()->translatedFormat('l, d F Y') }}</div>
    </div>
    <div class="mt-3 h-0.5 bg-gradient-to-r from-blue-500 via-indigo-400 to-transparent rounded-full"></div>
</div>

@php
$cards = [
    ['key' => 'visitors_today', 'change' => 'yesterday_change', 'label' => 'Harian', 'vs' => 'vs kemarin', 'icon' => 'clock', 'colors' => ['bg' => 'from-blue-500 to-blue-600', 'icon' => 'bg-blue-50', 'iconText' => 'text-blue-600']],
    ['key' => 'visitors_week', 'change' => 'week_change', 'label' => 'Mingguan', 'vs' => 'vs minggu lalu', 'icon' => 'calendar', 'colors' => ['bg' => 'from-indigo-500 to-indigo-600', 'icon' => 'bg-indigo-50', 'iconText' => 'text-indigo-600']],
    ['key' => 'visitors_month', 'change' => 'month_change', 'label' => 'Bulanan', 'vs' => 'vs bulan lalu', 'icon' => 'globe', 'colors' => ['bg' => 'from-emerald-500 to-emerald-600', 'icon' => 'bg-emerald-50', 'iconText' => 'text-emerald-600']],
    ['key' => 'visitors_year', 'change' => 'year_change', 'label' => 'Tahunan', 'vs' => 'vs tahun lalu', 'icon' => 'trending', 'colors' => ['bg' => 'from-amber-500 to-amber-600', 'icon' => 'bg-amber-50', 'iconText' => 'text-amber-600']],
];

$icons = [
    'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
    'globe' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'trending' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    @foreach($cards as $c)
    @php $change = $totals[$c['change']]; @endphp
    <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 relative overflow-hidden">
        <div class="h-1 bg-gradient-to-r {{ $c['colors']['bg'] }}"></div>
        <div class="p-5">
            <div class="flex items-center justify-between mb-1">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#94a3b8]">{{ $c['label'] }}</span>
            </div>
            <div class="text-3xl font-extrabold text-[#0f172a] tracking-tight">{{ number_format($totals[$c['key']]) }}</div>
            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center gap-1.5">
                <span class="inline-flex items-center gap-1 text-xs font-bold px-2 py-1 rounded-full {{ $change >= 0 ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-600' }}">
                    {{ $change >= 0 ? '↑' : '↓' }} {{ abs($change) }}%
                </span>
                <span class="text-[11px] text-[#94a3b8]">{{ $c['vs'] }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-base font-bold text-[#1e293b]">Trafik Pengunjung</h3>
            <p class="text-[11px] text-[#94a3b8] mt-0.5" id="chartSubtitle">Rata-rata <span class="font-semibold text-[#64748b]">{{ number_format($dailyAvg) }}</span> kunjungan/hari &mdash; Puncak <span class="font-semibold text-[#64748b]">{{ number_format($dailyPeak['value'] ?? 0) }}</span> <span class="text-[#94a3b8]">({{ $dailyPeak['label'] ?? '-' }})</span></p>
        </div>
        <div class="flex gap-1.5 bg-gray-100 p-1 rounded-xl" id="periodTabs">
            <button data-period="daily" class="period-tab text-xs font-semibold px-3.5 py-1.5 rounded-lg bg-white text-blue-600 shadow-sm transition-all">Harian</button>
            <button data-period="weekly" class="period-tab text-xs font-semibold px-3.5 py-1.5 rounded-lg text-[#64748b] hover:text-[#1e293b] transition-colors">Mingguan</button>
            <button data-period="monthly" class="period-tab text-xs font-semibold px-3.5 py-1.5 rounded-lg text-[#64748b] hover:text-[#1e293b] transition-colors">Bulanan</button>
            <button data-period="yearly" class="period-tab text-xs font-semibold px-3.5 py-1.5 rounded-lg text-[#64748b] hover:text-[#1e293b] transition-colors">Tahunan</button>
        </div>
    </div>
    <div class="relative" style="height: 300px;">
        <canvas id="visitorChart"></canvas>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const periods = {
        daily: {
            labels: {!! $dailyData->pluck('label')->toJson() !!},
            values: {!! $dailyData->pluck('value')->toJson() !!},
            label: 'Harian',
            unit: 'hari',
            maxTicks: 10
        },
        weekly: {
            labels: {!! $weeklyData->pluck('label')->toJson() !!},
            values: {!! $weeklyData->pluck('value')->toJson() !!},
            label: 'Mingguan',
            unit: 'minggu',
            maxTicks: 6
        },
        monthly: {
            labels: {!! $monthlyData->pluck('label')->toJson() !!},
            values: {!! $monthlyData->pluck('value')->toJson() !!},
            label: 'Bulanan',
            unit: 'bulan',
            maxTicks: 6
        },
        yearly: {
            labels: {!! $yearlyData->pluck('label')->toJson() !!},
            values: {!! $yearlyData->pluck('value')->toJson() !!},
            label: 'Tahunan',
            unit: 'tahun',
            maxTicks: 5
        }
    };

    let activePeriod = 'daily';
    let visitorChart = null;
    const subtitleEl = document.getElementById('chartSubtitle');

    function updateSubtitle(data) {
        const total = data.values.reduce((a, b) => a + b, 0);
        const avg = Math.round(total / data.values.length);
        const peak = Math.max(...data.values);
        const peakIdx = data.values.indexOf(peak);
        const peakLabel = data.labels[peakIdx];
        subtitleEl.innerHTML = 'Rata-rata <span class="font-semibold text-[#64748b]">' + avg + '</span> kunjungan/' + data.unit + ' &mdash; Puncak <span class="font-semibold text-[#64748b]">' + peak + '</span> <span class="text-[#94a3b8]">(' + peakLabel + ')</span>';
    }

    function renderPeriodChart(period) {
        const data = periods[period];
        const canvas = document.getElementById('visitorChart');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        if (visitorChart) visitorChart.destroy();
        updateSubtitle(data);

        visitorChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: data.label,
                    data: data.values,
                    backgroundColor: 'rgba(59,130,246,0.7)',
                    borderColor: 'rgba(59,130,246,0.95)',
                    borderWidth: 1,
                    borderRadius: 3,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleFont: { size: 11 },
                        bodyFont: { size: 12 },
                        padding: 10,
                        cornerRadius: 8,
                        callbacks: {
                            label: ctx => ctx.parsed.y + ' kunjungan'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9', drawBorder: false },
                        ticks: { font: { size: 10, family: 'Inter' }, color: '#94a3b8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { maxTicksLimit: data.maxTicks, font: { size: 9, family: 'Inter' }, color: '#94a3b8' }
                    }
                }
            }
        });
    }

    renderPeriodChart(activePeriod);

    document.querySelectorAll('.period-tab').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.period-tab').forEach(b => {
                b.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
                b.classList.add('text-[#64748b]');
            });
            this.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
            this.classList.remove('text-[#64748b]');
            activePeriod = this.dataset.period;
            renderPeriodChart(activePeriod);
        });
    });
});
</script>
@endpush
@endsection