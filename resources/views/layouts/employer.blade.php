<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Bank Employer — @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body id="body-root">

<div class="employer-layout">

    {{-- ── SIDEBAR ── --}}
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-mark">CD</div>
            <div>
                <div class="sidebar-brand">Career Bank</div>
                <div class="sidebar-sub">Employer Portal</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('employer.dashboard') }}" class="sidebar-item {{ request()->routeIs('employer.dashboard') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard"></i> Dashboard
            </a>

            <div class="sidebar-section">Jobs</div>
            <a href="{{ route('employer.jobs.create') }}" class="sidebar-item {{ request()->routeIs('employer.jobs.create') ? 'active' : '' }}">
                <i class="ti ti-plus"></i> Post a Job
            </a>
            <a href="{{ route('employer.jobs.index') }}" class="sidebar-item {{ request()->routeIs('employer.jobs.index') ? 'active' : '' }}">
                <i class="ti ti-briefcase"></i> My Listings
            </a>

            <div class="sidebar-section">Talent</div>
            <a href="{{ route('employer.candidates') }}" class="sidebar-item {{ request()->routeIs('employer.candidates') ? 'active' : '' }}">
                <i class="ti ti-users"></i> Candidates
            </a>

            <div class="sidebar-section">Account</div>
            <a href="{{ route('employer.profile') }}" class="sidebar-item {{ request()->routeIs('employer.profile') ? 'active' : '' }}">
                <i class="ti ti-building"></i> Company Profile
            </a>
<a href="{{ route('employer.settings') }}" class="sidebar-item {{ request()->routeIs('employer.settings') ? 'active' : '' }}">
    <i class="ti ti-settings"></i> Settings
</a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'AX', 0, 2)) }}
                </div>
                <div>
                    <div class="sidebar-username">{{ auth()->user()->name ?? 'Axiata HR' }}</div>
                    <div class="sidebar-role">Employer Account</div>
                </div>
            </div>
            <div style="margin-top:8px">
                <div class="theme-toggle" onclick="toggleTheme()" style="width:100%">
                    <div class="toggle-track"><div class="toggle-thumb"></div></div>
                    <span class="toggle-label" id="theme-label">Dark mode</span>
                </div>
<a href="/" class="sidebar-item" style="color: #ff4d4d; display: flex; align-items: center; gap: 8px; text-decoration: none;">
            <i class="ti ti-logout" style="font-size: 18px;"></i>
            <span style="font-size: 13px; font-weight: 500;">Sign Out</span>
        </a>
            </div>
        </div>
    </aside>

    {{-- ── MAIN CONTENT ── --}}
    <div class="employer-content">
        {{-- Topbar --}}
        <div class="employer-topbar">
            <div>
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-sub">@yield('page-sub', '')</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
                <button class="nav-icon-btn"><i class="ti ti-bell"></i></button>
                <a href="{{ route('employer.dashboard') }}" class="nav-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'AX', 0, 2)) }}
                </a>
            </div>
        </div>

        {{-- Page content --}}
        <main>
            @yield('content')
        </main>
    </div>

</div>

<script>
    const body  = document.getElementById('body-root');
    const label = document.getElementById('theme-label');
    const saved = localStorage.getItem('cdna-theme') || 'dark';
    if (saved === 'light') { body.classList.add('light'); label.textContent = 'Light mode'; }

    function toggleTheme() {
        body.classList.toggle('light');
        const isLight = body.classList.contains('light');
        label.textContent = isLight ? 'Light mode' : 'Dark mode';
        localStorage.setItem('cdna-theme', isLight ? 'light' : 'dark');
    }

    function showModal(id)  { document.getElementById(id).style.display = 'flex'; document.body.style.overflow = 'hidden'; }
    function closeModal(id) { document.getElementById(id).style.display = 'none';  document.body.style.overflow = ''; }
</script>
@stack('scripts')
</body>
</html>