@extends('admin.layouts.app')
@section('title', 'Dashboard')
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

<div class="flex items-center justify-between mb-4">
    <div>
        <h3 class="text-base font-bold text-[#1e293b]">Ringkasan Konten</h3>
        <p class="text-[11px] text-[#94a3b8] mt-0.5">Kelola konten utama website Anda dengan cepat.</p>
    </div>
    <a href="{{ route('admin.settings.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700 no-underline">Atur Website →</a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-6">
    @foreach($contentSummary as $s)
    <a href="{{ $s['route'] }}" class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 p-4 flex items-center gap-3 no-underline">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $s['colors']['bg'] }} flex items-center justify-center text-white shrink-0">
            @if($s['icon'] === 'folder')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            @elseif($s['icon'] === 'tag')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A1.994 1.994 0 0 1 3 12V7a4 4 0 0 1 4-4z"/></svg>
            @elseif($s['icon'] === 'grid')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            @elseif($s['icon'] === 'help')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            @elseif($s['icon'] === 'message')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            @elseif($s['icon'] === 'mail')
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            @endif
        </div>
        <div class="min-w-0">
            <div class="text-xl font-extrabold text-[#0f172a] leading-none">{{ number_format($s['count']) }}</div>
            <div class="text-[11px] font-medium text-[#64748b] truncate">{{ $s['label'] }}</div>
        </div>
    </a>
    @endforeach
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-base font-bold text-[#1e293b]">Trafik Pengunjung</h3>
            <p class="text-[11px] text-[#94a3b8] mt-0.5" id="chartSubtitle">Rata-rata <span class="font-semibold text-[#64748b]">{{ number_format($dailyAvg) }}</span> kunjungan/hari &mdash; Puncak <span class="font-semibold text-[#64748b]">{{ number_format($dailyPeak['value'] ?? 0) }}</span> <span class="text-[#94a3b8]">({{ $dailyPeak['label'] ?? '-' }})</span></p>
        </div>
    </div>
    <div class="relative w-full overflow-hidden" id="visitorChartContainer" style="height: 300px;">
        <canvas id="visitorChart" class="w-full h-full block"></canvas>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between mb-1">
        <h3 class="text-base font-bold text-[#1e293b]">Pesan Masuk Terbaru</h3>
        @if($unreadMessages > 0)
        <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $unreadMessages }} belum dibaca</span>
        @endif
    </div>
    <p class="text-[11px] text-[#94a3b8] mb-5">Dari total {{ number_format($totalMessages) }} pesan.</p>
    @if($latestMessages->isEmpty())
    <div class="text-sm text-[#94a3b8] text-center py-10">Belum ada pesan masuk.</div>
    @else
    <div class="divide-y divide-gray-50">
        @foreach($latestMessages as $msg)
        <a href="{{ route('admin.messages.index') }}" class="flex items-start gap-3 py-3 no-underline group">
            <div class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">
                {{ strtoupper(substr($msg->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-sm font-semibold text-[#1e293b] truncate">{{ $msg->name }}</span>
                    <span class="text-[10px] text-[#94a3b8] shrink-0">{{ $msg->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-xs text-[#64748b] line-clamp-1">{{ $msg->message }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <a href="{{ route('admin.messages.index') }}" class="mt-3 text-xs font-semibold text-blue-600 hover:text-blue-700 no-underline">Lihat semua pesan →</a>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('visitorChart');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    const visitorChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! $dailyData->pluck('label')->toJson() !!},
            datasets: [{
                label: 'Harian',
                data: {!! $dailyData->pluck('value')->toJson() !!},
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
                    ticks: { maxTicksLimit: 10, font: { size: 9, family: 'Inter' }, color: '#94a3b8' }
                }
            }
        }
    });

    const chartContainer = document.getElementById('visitorChartContainer');
    if (chartContainer && typeof ResizeObserver !== 'undefined') {
        new ResizeObserver(() => visitorChart.resize()).observe(chartContainer);
    }
});
</script>
@endpush
@endsection