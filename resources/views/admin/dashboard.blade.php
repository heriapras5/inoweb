@extends('admin.layouts.app')
@section('title', 'Dashboard')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush
@section('content')
@php
$deviceColors = ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b', '#ef4444'];
$deviceLabels = ['Desktop', 'Mobile', 'Tablet', 'Lainnya'];
@endphp

<div class="mb-6">
    <h1 class="text-2xl font-bold text-[#1e293b]">Dashboard</h1>
    <p class="text-sm text-[#64748b] mt-1">Selamat datang kembali, <span class="font-medium text-[#1e293b]">{{ auth()->user()->name }}</span>! <span class="text-[#94a3b8]">{{ now()->translatedFormat('l, d F Y') }}</span></p>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ number_format($stats['visitors_total']) }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Total Pengunjung</div>
            </div>
        </div>
        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-1">
            <span class="text-xs {{ $stats['visitors_change'] >= 0 ? 'text-green-600' : 'text-red-500' }}">
                {{ $stats['visitors_change'] >= 0 ? '↑' : '↓' }} {{ abs($stats['visitors_change']) }}%
            </span>
            <span class="text-xs text-[#94a3b8]">vs minggu lalu</span>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ $stats['projects'] }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Total Projek</div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-rose-100 rounded-xl flex items-center justify-center text-rose-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ $stats['messages'] }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Pesan Masuk</div>
            </div>
        </div>
        @if($stats['unread_messages'] > 0)
        <div class="mt-3 pt-3 border-t border-gray-100">
            <span class="text-xs text-red-500 font-medium">{{ $stats['unread_messages'] }} belum dibaca</span>
        </div>
        @endif
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ $stats['testimonials'] }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Testimoni</div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-5">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-2xl font-bold text-[#1e293b]">{{ $stats['services'] }}</div>
                <div class="text-xs text-[#64748b] mt-0.5">Layanan Aktif</div>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-bold text-[#1e293b]">Statistik Pengunjung</h3>
            <span class="text-xs text-[#94a3b8] bg-gray-100 px-2.5 py-1 rounded-lg">30 Hari Terakhir</span>
        </div>
        <div class="relative" style="height: 280px;">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-bold text-[#1e293b]">Sumber Pengunjung</h3>
            <span class="text-xs text-[#94a3b8] bg-gray-100 px-2.5 py-1 rounded-lg">Device</span>
        </div>
        <div class="relative" style="height: 220px;">
            <canvas id="deviceChart"></canvas>
        </div>
        <div class="mt-4 space-y-2.5" id="deviceLegend"></div>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-[#1e293b]">Proyek Terbaru</h3>
            <a href="{{ route('admin.projects.index') }}" class="text-xs text-blue-600 hover:underline font-medium">Lihat Semua</a>
        </div>
        @if($latestProjects->count())
        <div class="space-y-3">
            @foreach($latestProjects as $p)
            <div class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-sm">
                    {{ strtoupper(substr($p->name, 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-medium text-[#1e293b] truncate">{{ $p->name }}</div>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-[10px] text-[#64748b]">{{ $p->category?->name ?? '-' }}</span>
                        @if($p->status)
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-sm text-[#94a3b8]">Belum ada proyek.</p>
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
    <div class="bg-white rounded-xl border border-gray-200/80 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-[#1e293b]">Aktivitas Terbaru</h3>
        </div>
        <div class="space-y-0">
            @php
            $activities = [];
            if ($stats['projects'] > 0) $activities[] = ['icon' => 'folder', 'color' => 'bg-amber-100 text-amber-600', 'text' => "$stats[projects] proyek terdaftar", 'time' => 'Total'];
            if ($stats['services'] > 0) $activities[] = ['icon' => 'grid', 'color' => 'bg-cyan-100 text-cyan-600', 'text' => "$stats[services] layanan tersedia", 'time' => 'Total'];
            if ($stats['testimonials'] > 0) $activities[] = ['icon' => 'message', 'color' => 'bg-purple-100 text-purple-600', 'text' => "$stats[testimonials] testimoni diterima", 'time' => 'Total'];
            if ($stats['messages'] > 0) $activities[] = ['icon' => 'mail', 'color' => 'bg-rose-100 text-rose-600', 'text' => "$stats[messages] pesan masuk", 'time' => 'Total'];
            if ($stats['visitors_today'] > 0) $activities[] = ['icon' => 'eye', 'color' => 'bg-blue-100 text-blue-600', 'text' => "$stats[visitors_today] pengunjung hari ini", 'time' => 'Hari ini'];
            @endphp
            @foreach($activities as $i => $act)
            <div class="flex items-start gap-3 py-3 {{ $i > 0 ? 'border-t border-gray-100' : '' }}">
                <div class="w-7 h-7 {{ $act['color'] }} rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                    @if($act['icon'] === 'folder')
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    @elseif($act['icon'] === 'grid')
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    @elseif($act['icon'] === 'message')
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    @elseif($act['icon'] === 'mail')
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/></svg>
                    @elseif($act['icon'] === 'eye')
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm text-[#475569]">{{ $act['text'] }}</div>
                    <div class="text-xs text-[#94a3b8] mt-0.5">{{ $act['time'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const visitorCtx = document.getElementById('visitorChart');
    if (visitorCtx) {
        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: {!! $chartData->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m'))->toJson() !!},
                datasets: [{
                    label: 'Pengunjung',
                    data: {!! $chartData->pluck('visitors')->toJson() !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.08)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { stepSize: 1 } },
                    x: { grid: { display: false }, ticks: { maxTicksLimit: 10 } }
                }
            }
        });
    }

    const deviceCtx = document.getElementById('deviceChart');
    if (deviceCtx) {
        const deviceData = {!! $deviceData->toJson() !!};
        const labels = deviceData.map(d => {
            const map = { 'desktop': 'Desktop', 'mobile': 'Mobile', 'tablet': 'Tablet' };
            return map[d.device_type] || d.device_type;
        });
        const values = deviceData.map(d => d.total);
        const colors = ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b', '#ef4444'].slice(0, values.length);
        const total = values.reduce((a, b) => a + b, 0);

        const chart = new Chart(deviceCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: colors,
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
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

        const legendEl = document.getElementById('deviceLegend');
        if (legendEl) {
            labels.forEach(function(label, i) {
                const pct = ((values[i] / total) * 100).toFixed(1);
                const div = document.createElement('div');
                div.className = 'flex items-center justify-between text-xs';
                div.innerHTML = '<div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full" style="background:' + colors[i] + '"></span><span class="text-[#475569]">' + label + '</span></div><span class="font-medium text-[#1e293b]">' + values[i] + ' (' + pct + '%)</span>';
                legendEl.appendChild(div);
            });
        }
    }
});
</script>
@endpush
@endsection