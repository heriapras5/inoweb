<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin INOWEB') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-[#0a192f] text-white flex flex-col shrink-0">
            <div class="p-6 border-b border-white/10">
                <a href="{{ url('/admin') }}" class="text-xl font-bold tracking-wide">{!! nl2br(e(setting('site_name', 'INOWEB'))) !!} <span class="text-xs text-white/60 font-normal">Admin</span></a>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.services*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    Layanan
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.projects*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    Proyek
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.faqs*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    FAQ
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.testimonials*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Testimoni
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.messages*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Pesan Masuk
                </a>
                <div class="pt-4 pb-1 px-4 text-[0.65rem] tracking-widest text-white/30 uppercase font-semibold">Konfigurasi</div>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.settings*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Pengaturan Website
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/70 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('admin.users*') ? 'bg-white/10 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Manajemen Admin
                </a>
            </nav>
            <div class="p-4 border-t border-white/10">
                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Lihat Website
                </a>
                <a href="{{ route('logout') }}" class="flex items-center gap-2 text-white/50 hover:text-white text-sm transition-colors mt-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        </aside>
        <main class="flex-1 overflow-auto">
            <header class="bg-white border-b px-8 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-[#1a1a2e]">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center gap-3 text-sm text-[#64748b]">
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </header>
            <div class="p-8">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6">{{ session('success') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
