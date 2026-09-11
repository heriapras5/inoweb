<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Admin {{ setting('site_name', 'INOWEB') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="status-toggle-url" content="{{ Route::has('admin.status.toggle') ? route('admin.status.toggle') : '' }}">
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/css/admin-summernote.css', 'resources/js/app.js', 'resources/js/admin.js'])
    @php $faviconVersion = md5(setting('favicon') ?: setting('logo_image')); @endphp
    <link rel="icon" type="image/png" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    <link rel="shortcut icon" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    @if(setting('logo_image'))
    <link rel="apple-touch-icon" href="{{ asset(setting('logo_image')) }}">
    @else
    <link rel="apple-touch-icon" href="{{ url('/favicon.png') }}?v={{ $faviconVersion }}">
    @endif

    <style>
        html { height: 100%; }
        body { height: 100%; touch-action: manipulation; }
        [x-cloak] { display: none !important; }
        .content-scroll { touch-action: manipulation; overscroll-behavior: contain; }
        .note-editor .note-editing-area .note-editable { min-height: 200px; }
        .note-editor { border-radius: 12px !important; overflow: hidden; }
        .note-toolbar { border-radius: 12px 12px 0 0 !important; }

        nav[aria-label="Pagination"] { display: flex; align-items: center; gap: 4px; }
        nav[aria-label="Pagination"] a, nav[aria-label="Pagination"] span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 36px; height: 36px; padding: 0 8px;
            border-radius: 9999px; font-size: 13px; font-weight: 500;
            transition: all 0.2s;
        }
        nav[aria-label="Pagination"] a:hover { background: #e2e8f0; }
        nav[aria-label="Pagination"] span[aria-current="page"] {
            background: linear-gradient(135deg, #0a192f, #1a365d);
            color: white; box-shadow: 0 2px 8px rgba(10,25,47,0.25);
        }
        nav[aria-label="Pagination"] .disabled span { opacity: 0.3; cursor: default; }

        .sidebar-link { transition: all 0.2s; position: relative; border-radius: 10px; margin: 1px 0; }
        .sidebar-link:hover { background: rgba(255,255,255,0.07); }
        .sidebar-link.active {
            background: linear-gradient(135deg, rgba(37,99,235,0.2) 0%, transparent 100%);
            color: white;
        }
        .sidebar-link.active svg { color: #93c5fd; }

        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }

        .content-scroll::-webkit-scrollbar { width: 6px; }
        .content-scroll::-webkit-scrollbar-track { background: transparent; }
        .content-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        .content-scroll::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        .admin-sidebar { transition: transform 0.3s ease, width 0.25s ease, opacity 0.2s ease; }

        /* Mobile: off-canvas, hidden by default */
        @media (max-width: 1023px) {
            .admin-sidebar {
                position: fixed; top: 0; left: 0; width: 288px; height: 100%;
                z-index: 50; transform: translateX(-100%);
                pointer-events: none;
            }
            body.sidebar-toggled .admin-sidebar { transform: translateX(0); pointer-events: auto; }
            .sidebar-overlay {
                position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 40;
                display: none;
            }
            body.sidebar-toggled .sidebar-overlay { display: block; }
        }

        /* Desktop: always open at 288px; collapse when toggled */
        @media (min-width: 1024px) {
            .admin-sidebar { width: 288px; min-width: 288px; overflow: visible; }
            body.sidebar-toggled .admin-sidebar {
                width: 0; min-width: 0; overflow: hidden; opacity: 0; pointer-events: none;
            }
            .sidebar-overlay { display: none !important; }
        }
    </style>
    @stack('styles')
</head>
<body x-data="{ userDropdown: false, notifDropdown: false }"
      class="bg-[#f1f5f9] font-sans text-[#1e293b] h-screen overflow-hidden">

    <!-- Flash Message: satu komponen untuk success/error/warning/info -->
    <div class="fixed top-4 right-4 z-[100] max-w-sm w-full space-y-2">
        <x-flash-message type="success" :message="session('success')" />
        <x-flash-message type="error" :message="session('error')" />
        <x-flash-message type="warning" :message="session('warning')" />
        <x-flash-message type="info" :message="session('info')" />
    </div>

    <!-- Mobile Overlay -->
    <div onclick="document.body.classList.remove('sidebar-toggled')" class="sidebar-overlay" id="adminOverlay"></div>

    <div class="flex h-full min-h-0">
        <!-- ========== SIDEBAR ========== -->
        <aside class="admin-sidebar bg-[#0a192f] text-white flex flex-col h-full shrink-0">
            <div class="shrink-0">
                <!-- Logo -->
                @php $logoImage = setting('logo_image'); $logoSvg = setting('logo_icon'); @endphp
                <div class="px-6 pt-6 pb-4">
                    <a href="{{ url('/admin') }}" class="flex items-center gap-3">
                        @if($logoImage)
                        <img src="{{ asset($logoImage) }}" alt="{{ setting('site_name', 'INOWEB') }}" class="w-9 h-9 rounded-xl object-cover shadow-lg shadow-blue-600/20 shrink-0">
                        @elseif($logoSvg)
                        <div class="w-9 h-9 flex items-center justify-center text-blue-400 shrink-0">{!! $logoSvg !!}</div>
                        @else
                        <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-600/30 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        @endif
                        <div>
                            <span class="text-lg font-bold tracking-wide">{!! nl2br(e(setting('site_name', 'INOWEB'))) !!}</span>
                            <span class="block text-[0.55rem] tracking-[0.2em] text-blue-300/50 uppercase font-semibold -mt-0.5">{{ setting('site_tagline', 'INOVASI WEBSITE') }}</span>
                        </div>
                    </a>
                </div>

            @php $unreadCount = \App\Models\Message::where('is_read', false)->count(); @endphp

            <!-- Nav -->
            <nav class="flex-1 overflow-y-auto px-3 pb-3 sidebar-scroll">
                <div class="text-[0.55rem] tracking-[0.2em] text-white/25 uppercase font-semibold px-3 pt-2 pb-1.5">Menu Utama</div>

                <template x-for="item in [
                    { label: 'Dashboard', route: '{{ route('admin.dashboard') }}', icon: 'dashboard', active: '{{ request()->routeIs('admin.dashboard') ? 'true' : 'false' }}' },
                    { label: 'Hero', route: '{{ route('admin.hero-sections.index') }}', icon: 'image', active: '{{ request()->routeIs('admin.hero-sections*') ? 'true' : 'false' }}' },
                    { label: 'Banner', route: '{{ route('admin.banners.index') }}', icon: 'image', active: '{{ request()->routeIs('admin.banners*') ? 'true' : 'false' }}' },
                    { label: 'Tentang', route: '{{ route('admin.about-sections.index') }}', icon: 'grid', active: '{{ request()->routeIs('admin.about-sections*') ? 'true' : 'false' }}' },
                    { label: 'Kategori Projek', route: '{{ route('admin.project-categories.index') }}', icon: 'tag', active: '{{ request()->routeIs('admin.project-categories*') ? 'true' : 'false' }}' },
                    { label: 'Projek', route: '{{ route('admin.projects.index') }}', icon: 'folder', active: '{{ request()->routeIs('admin.projects*') ? 'true' : 'false' }}' },
                    { label: 'Layanan', route: '{{ route('admin.services.index') }}', icon: 'grid', active: '{{ request()->routeIs('admin.services*') ? 'true' : 'false' }}' },
                    { label: 'Klien', route: '{{ route('admin.clients.index') }}', icon: 'message', active: '{{ request()->routeIs('admin.clients*') ? 'true' : 'false' }}' },
                    { label: 'Partner', route: '{{ route('admin.partners.index') }}', icon: 'message', active: '{{ request()->routeIs('admin.partners*') ? 'true' : 'false' }}' },
                    { label: 'Menu', route: '{{ route('admin.menus.index') }}', icon: 'dashboard', active: '{{ request()->routeIs('admin.menus*') ? 'true' : 'false' }}' },
                    { label: 'CTA', route: '{{ route('admin.cta-sections.index') }}', icon: 'grid', active: '{{ request()->routeIs('admin.cta-sections*') ? 'true' : 'false' }}' },
                    { label: 'Info Kontak', route: '{{ route('admin.contact-info.index') }}', icon: 'mail', active: '{{ request()->routeIs('admin.contact-info*') ? 'true' : 'false' }}' },
                    { label: 'FAQ', route: '{{ route('admin.faqs.index') }}', icon: 'help', active: '{{ request()->routeIs('admin.faqs*') ? 'true' : 'false' }}' },
                    { label: 'Testimoni', route: '{{ route('admin.testimonials.index') }}', icon: 'message', active: '{{ request()->routeIs('admin.testimonials*') ? 'true' : 'false' }}' },
                    { label: 'Pesan Masuk', route: '{{ route('admin.messages.index') }}', icon: 'mail', active: '{{ request()->routeIs('admin.messages*') ? 'true' : 'false' }}', badge: {{ $unreadCount }} },
                    { label: 'Traffic', route: '{{ route('admin.traffics.index') }}', icon: 'seo', active: '{{ request()->routeIs('admin.traffics*') ? 'true' : 'false' }}' },
                    { label: 'SEO', route: '{{ route('admin.seo.index') }}', icon: 'seo', active: '{{ request()->routeIs('admin.seo*') ? 'true' : 'false' }}' },
                ]" x-key="item.label">
                    <a :href="item.route"
                           class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm text-white/70 hover:text-white"
                           :class="item.active === 'true' ? 'active' : ''">
                            <template x-if="item.icon === 'dashboard'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            </template>
                            <template x-if="item.icon === 'image'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                            </template>
                            <template x-if="item.icon === 'tag'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A1.994 1.994 0 0 1 3 12V7a4 4 0 0 1 4-4z"/></svg>
                            </template>
                            <template x-if="item.icon === 'folder'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                            </template>
                            <template x-if="item.icon === 'grid'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </template>
                            <template x-if="item.icon === 'help'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            </template>
                            <template x-if="item.icon === 'message'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            </template>
                            <template x-if="item.icon === 'mail'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </template>
                            <template x-if="item.icon === 'seo'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                            </template>
                            <span x-text="item.label" class="flex-1"></span>
                            <template x-if="item.badge && item.badge > 0">
                                <span class="bg-red-500 text-white text-[9px] px-1.5 py-0.5 rounded-full min-w-[18px] text-center" x-text="item.badge"></span>
                            </template>
                        </a>
                </template>

                <div class="text-[0.55rem] tracking-[0.2em] text-white/25 uppercase font-semibold px-3 pt-5 pb-1.5">Sistem</div>

                <div>
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm text-white/70 hover:text-white {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        Pengaturan Website
                    </a>
                </div>
                @if(auth()->user()?->isSuperAdmin())
                <div>
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm text-white/70 hover:text-white {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Manajemen Admin
                    </a>
                </div>
                @endif
            </nav>
        </aside>

        <!-- ========== MAIN CONTENT ========== -->
        <main class="flex-1 flex flex-col min-w-0 min-h-0">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200/60 px-4 lg:px-6 py-3 flex items-center justify-between shrink-0 shadow-sm">
                <div class="flex items-center gap-3 lg:gap-6 flex-1 min-w-0">
                    <button type="button" onclick="document.body.classList.toggle('sidebar-toggled')" class="text-[#64748b] hover:text-[#1e293b]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    </button>
                    <form method="GET" action="{{ route('admin.search') }}" class="hidden md:flex items-center flex-1 max-w-md">
                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8]" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari layanan, projek, FAQ..." class="admin-input pl-9">
                        </div>
                    </form>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ url('/') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-xs text-[#64748b] hover:text-blue-600 hover:bg-blue-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        Kunjungi Website
                    </a>
                    <div class="relative" @click.away="notifDropdown = false">
                        <button @click="notifDropdown = !notifDropdown" class="relative p-2 rounded-lg text-[#64748b] hover:text-[#1e293b] hover:bg-gray-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            @if($unreadCount > 0)
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                            @endif
                        </button>
                        <div x-show="notifDropdown" x-cloak
                             class="absolute right-0 top-full mt-2 w-72 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-semibold text-[#1e293b]">Notifikasi</p>
                            </div>
                            <div class="max-h-60 overflow-y-auto">
                                @if($unreadCount > 0)
                                <a href="{{ route('admin.messages.index') }}" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/></svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-[#1e293b]">Ada <strong>{{ $unreadCount }}</strong> pesan baru belum dibaca</p>
                                        <p class="text-xs text-[#94a3b8] mt-0.5">Klik untuk melihat</p>
                                    </div>
                                </a>
                                @else
                                <div class="px-4 py-8 text-center text-sm text-[#94a3b8]">Tidak ada notifikasi</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="relative" @click.away="userDropdown = false">
                        <button @click="userDropdown = !userDropdown" class="flex items-center gap-2 pl-2 border-l border-gray-200 hover:opacity-80 transition-opacity">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="hidden sm:flex items-center gap-1">
                                <span class="text-sm text-[#64748b]">{{ auth()->user()->name }}</span>
                                <svg :class="userDropdown ? 'rotate-180' : ''" class="text-[#94a3b8] transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </div>
                        </button>
                        <div x-show="userDropdown" x-cloak
                             @click.away="userDropdown = false"
                             class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50">
                            <a href="{{ route('admin.users.edit', auth()->user()) }}" class="flex items-center gap-2.5 px-4 py-3 text-sm text-[#1e293b] hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#94a3b8]"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                Profil
                            </a>
                            <hr class="border-gray-100">
                            <button @click="window.confirmLogout()" class="w-full flex items-center gap-2.5 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto min-h-0 p-4 lg:p-6 content-scroll">
                @yield('content')
            </div>

            @stack('modals')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

    @stack('scripts')
</body>
</html>