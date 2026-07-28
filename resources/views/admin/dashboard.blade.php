@extends('admin.layouts.app')
@section('title', 'Dashboard')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush
@section('content')
@php
$deviceColors = ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b', '#ef4444'];
@endphp

<div class="mb-6">
    <h1 class="text-2xl font-bold text-[#1e293b]">Dashboard Visitor</h1>
    <p class="text-sm text-[#64748b] mt-1">Selamat datang kembali, <span class="font-medium text-[#1e293b]">{{ auth()->user()->name }}</span>! <span class="text-[#94a3b8]">{{ now()->translatedFormat('l, d F Y') }}</span></p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ number_format($totals['visitors_today']) }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Harian</div>
            </div>
        </div>
        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-1">
            <span class="text-xs {{ $totals['yesterday_change'] >= 0 ? 'text-green-600' : 'text-red-500' }}">
                {{ $totals['yesterday_change'] >= 0 ? '↑' : '↓' }} {{ abs($totals['yesterday_change']) }}%
            </span>
            <span class="text-xs text-[#94a3b8]">vs kemarin</span>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ number_format($totals['visitors_week']) }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Mingguan</div>
            </div>
        </div>
        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-1">
            <span class="text-xs {{ $totals['week_change'] >= 0 ? 'text-green-600' : 'text-red-500' }}">
                {{ $totals['week_change'] >= 0 ? '↑' : '↓' }} {{ abs($totals['week_change']) }}%
            </span>
            <span class="text-xs text-[#94a3b8]">vs minggu lalu</span>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ number_format($totals['visitors_month']) }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Bulanan</div>
            </div>
        </div>
        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-1">
            <span class="text-xs {{ $totals['month_change'] >= 0 ? 'text-green-600' : 'text-red-500' }}">
                {{ $totals['month_change'] >= 0 ? '↑' : '↓' }} {{ abs($totals['month_change']) }}%
            </span>
            <span class="text-xs text-[#94a3b8]">vs bulan lalu</span>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 2 12 12 16 14"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ number_format($totals['visitors_year']) }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Tahunan</div>
            </div>
        </div>
        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-1">
            <span class="text-xs {{ $totals['year_change'] >= 0 ? 'text-green-600' : 'text-red-500' }}">
                {{ $totals['year_change'] >= 0 ? '↑' : '↓' }} {{ abs($totals['year_change']) }}%
            </span>
            <span class="text-xs text-[#94a3b8]">vs tahun lalu</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
        </div>
        <div><div class="text-lg font-bold text-[#1e293b]">{{ $totals['projects'] }}</div><div class="text-xs text-[#64748b]">Projek</div></div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-rose-100 rounded-xl flex items-center justify-center text-rose-600 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/></svg>
        </div>
        <div><div class="text-lg font-bold text-[#1e293b]">{{ $totals['messages'] }}</div><div class="text-xs text-[#64748b]">Pesan Masuk</div></div>
        @if($totals['unread_messages'] > 0)
        <span class="ml-auto text-[10px] bg-red-500 text-white px-1.5 py-0.5 rounded-full">{{ $totals['unread_messages'] }} baru</span>
        @endif
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <div><div class="text-lg font-bold text-[#1e293b]">{{ $totals['testimonials'] }}</div><div class="text-xs text-[#64748b]">Testimoni</div></div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
            <h3 class="text-base font-bold text-[#1e293b]">Trafik Pengunjung</h3>
            <div class="flex gap-1" id="periodTabs">
                <button data-period="daily" class="period-tab text-xs font-semibold px-3 py-1.5 rounded-lg bg-blue-600 text-white transition-colors">Harian</button>
                <button data-period="weekly" class="period-tab text-xs font-semibold px-3 py-1.5 rounded-lg bg-gray-100 text-[#64748b] hover:bg-gray-200 transition-colors">Mingguan</button>
                <button data-period="monthly" class="period-tab text-xs font-semibold px-3 py-1.5 rounded-lg bg-gray-100 text-[#64748b] hover:bg-gray-200 transition-colors">Bulanan</button>
                <button data-period="yearly" class="period-tab text-xs font-semibold px-3 py-1.5 rounded-lg bg-gray-100 text-[#64748b] hover:bg-gray-200 transition-colors">Tahunan</button>
            </div>
        </div>
        <div class="relative" style="height: 280px;">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-bold text-[#1e293b]">Halaman Teratas</h3>
            <span class="text-xs text-[#94a3b8] bg-gray-100 px-2.5 py-1 rounded-lg">TOP 5</span>
        </div>
        @if($topPages->count())
        <div class="relative" style="height: 200px;">
            <canvas id="topPagesChart"></canvas>
        </div>
        <div class="mt-4 space-y-2" id="topPagesLegend"></div>
        @else
        <div class="flex items-center justify-center h-[200px] text-sm text-[#94a3b8]">Belum ada data</div>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-[#1e293b]">Halaman Paling Banyak Dikunjungi</h3>
            <span class="text-xs text-[#94a3b8] bg-gray-100 px-2.5 py-1 rounded-lg">Total: {{ number_format($totals['visitors_total']) }}</span>
        </div>
        @if($topPages->count())
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="text-left text-xs text-[#94a3b8] uppercase tracking-wider"><th class="pb-3 pr-4">#</th><th class="pb-3 pr-4">Halaman</th><th class="pb-3 pr-4 text-right">Kunjungan</th><th class="pb-3 text-right">%</th></tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($topPages as $i => $page)
                    @php $pct = $topPagesTotal > 0 ? round(($page->total / $topPagesTotal) * 100, 1) : 0; @endphp
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 pr-4 text-[#94a3b8] text-xs w-8">{{ $i + 1 }}</td>
                        <td class="py-3 pr-4 text-[#1e293b] truncate max-w-[300px]" title="{{ $page->page_url }}">{{ \Illuminate\Support\Str::limit($page->page_url, 60) }}</td>
                        <td class="py-3 pr-4 text-right font-medium text-[#1e293b]">{{ number_format($page->total) }}</td>
                        <td class="py-3 text-right text-[#64748b]">{{ $pct }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-sm text-[#94a3b8]">Belum ada data kunjungan.</p>
        @endif
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-[#1e293b]">Pesan Masuk</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-blue-600 hover:underline font-medium">Lihat Semua</a>
        </div>
        @if($recentMessages->count())
        <div class="space-y-2">
            @foreach($recentMessages as $msg)
            <div class="flex items-start gap-3 p-2.5 rounded-lg {{ !$msg->is_read ? 'bg-blue-50/60' : 'hover:bg-gray-50' }} transition-colors">
                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-sm">
                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-sm font-medium text-[#1e293b] truncate {{ !$msg->is_read ? 'font-semibold' : '' }}">{{ $msg->name }}</span>
                        <span class="text-[10px] text-[#94a3b8] shrink-0">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-xs text-[#64748b] truncate mt-0.5">{{ $msg->message }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-sm text-[#94a3b8]">Belum ada pesan.</p>
        @endif
    </div>
</div>

<div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-base font-bold text-[#1e293b]">Proyek Terbaru</h3>
        <a href="{{ route('admin.projects.index') }}" class="text-xs text-blue-600 hover:underline font-medium">Lihat Semua</a>
    </div>
    @if($latestProjects->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($latestProjects as $p)
        <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-sm">
                {{ strtoupper(substr($p->name, 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-[#1e293b] truncate">{{ $p->name }}</div>
                <div class="text-[10px] text-[#64748b] mt-0.5">{{ $p->category?->name ?? '-' }}</div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-sm text-[#94a3b8]">Belum ada proyek.</p>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ─── Period Chart ───
    const periods = {
        daily: {
            labels: {!! $dailyData->pluck('label')->toJson() !!},
            values: {!! $dailyData->pluck('value')->toJson() !!},
            type: 'line',
            label: 'Harian'
        },
        weekly: {
            labels: {!! $weeklyData->pluck('label')->toJson() !!},
            values: {!! $weeklyData->pluck('value')->toJson() !!},
            type: 'bar',
            label: 'Mingguan'
        },
        monthly: {
            labels: {!! $monthlyData->pluck('label')->toJson() !!},
            values: {!! $monthlyData->pluck('value')->toJson() !!},
            type: 'bar',
            label: 'Bulanan'
        },
        yearly: {
            labels: {!! $yearlyData->pluck('label')->toJson() !!},
            values: {!! $yearlyData->pluck('value')->toJson() !!},
            type: 'bar',
            label: 'Tahunan'
        }
    };

    let activePeriod = 'daily';
    let visitorChart = null;

    function renderPeriodChart(period) {
        const data = periods[period];
        const ctx = document.getElementById('visitorChart');
        if (!ctx) return;
        if (visitorChart) visitorChart.destroy();

        const isLine = data.type === 'line';
        visitorChart = new Chart(ctx, {
            type: data.type,
            data: {
                labels: data.labels,
                datasets: [{
                    label: data.label,
                    data: data.values,
                    borderColor: '#3b82f6',
                    backgroundColor: isLine ? 'rgba(59,130,246,0.08)' : 'rgba(59,130,246,0.6)',
                    borderWidth: isLine ? 2 : 0,
                    fill: isLine,
                    tension: isLine ? 0.4 : 0,
                    pointRadius: isLine ? 3 : 0,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    borderRadius: isLine ? 0 : 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: { label: ctx => ctx.parsed.y + ' kunjungan' } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { stepSize: 1 } },
                    x: { grid: { display: false }, ticks: { maxTicksLimit: isLine ? 10 : data.labels.length } }
                }
            }
        });
    }

    renderPeriodChart(activePeriod);

    document.querySelectorAll('.period-tab').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.period-tab').forEach(b => {
                b.classList.remove('bg-blue-600', 'text-white');
                b.classList.add('bg-gray-100', 'text-[#64748b]');
            });
            this.classList.remove('bg-gray-100', 'text-[#64748b]');
            this.classList.add('bg-blue-600', 'text-white');
            activePeriod = this.dataset.period;
            renderPeriodChart(activePeriod);
        });
    });

    // ─── Top Pages Doughnut ───
    const topPagesCtx = document.getElementById('topPagesChart');
    if (topPagesCtx) {
        const pages = {!! $topPages->toJson() !!};
        if (pages.length) {
            const labels = pages.map(p => {
                try { return new URL(p.page_url).pathname || '/'; } catch { return p.page_url; }
            });
            const values = pages.map(p => p.total);
            const colors = ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b', '#ef4444'];
            const total = values.reduce((a, b) => a + b, 0);

            new Chart(topPagesCtx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{ data: values, backgroundColor: colors, borderWidth: 0 }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '65%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(ctx) {
                                    const pct = ((ctx.parsed / total) * 100).toFixed(1);
                                    return ctx.label + ': ' + ctx.parsed + ' (' + pct + '%)';
                                }
                            }
                        }
                    }
                }
            });

            const legendEl = document.getElementById('topPagesLegend');
            if (legendEl) {
                labels.forEach(function(label, i) {
                    const pct = ((values[i] / total) * 100).toFixed(1);
                    const div = document.createElement('div');
                    div.className = 'flex items-center justify-between text-xs';
                    div.innerHTML = '<div class="flex items-center gap-2 min-w-0"><span class="w-2.5 h-2.5 rounded-full shrink-0" style="background:' + colors[i] + '"></span><span class="text-[#475569] truncate">' + label + '</span></div><span class="font-medium text-[#1e293b] shrink-0 ml-2">' + values[i] + ' (' + pct + '%)</span>';
                    legendEl.appendChild(div);
                });
            }
        }
    }
});
</script>
@endpush
@endsection