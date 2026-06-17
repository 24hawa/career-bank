<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Bank — @yield('title', 'Home')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body id="body-root">

    {{-- ── NAVBAR ── --}}
    <nav class="navbar">
        <a href="{{ route('candidate.home') }}" class="nav-logo">
            <div class="nav-mark">CB</div>
            <span class="nav-brand">Career Bank</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('candidate.home') }}"
               class="nav-link {{ request()->routeIs('candidate.home') ? 'active' : '' }}">
                Home
            </a>
                        <a href="{{ route('resume.builder') }}" class="nav-link {{ Request::is('candidate/resume-builder') ? 'active' : '' }}">
    <span>Resume Builder</span>
</a>
            {{-- ── UPDATED PROTOTYPE LINK ENGINE MAP ── --}}
            <a href="{{ route('candidate.guidance') }}"
               class="nav-link {{ request()->routeIs('candidate.guidance.*') ? 'active' : '' }}">
                Career Matches
            </a>
            <a href="{{ route('candidate.jobs') }}"
               class="nav-link {{ request()->routeIs('candidate.jobs') ? 'active' : '' }}">
                Search Jobs
            </a>
            <a href="/candidate/applications"
               class="nav-link {{ request()->routeIs('candidate.applications.*') ? 'active' : '' }}">
                My Applications
            </a>
        </div>

        <div class="nav-right">
            {{-- Theme toggle --}}
            <div class="theme-toggle" onclick="toggleTheme()" title="Toggle dark/light mode">
                <div class="toggle-track">
                    <div class="toggle-thumb"></div>
                </div>
                <span class="toggle-label" id="theme-label">Dark</span>
            </div>

            {{-- Notification --}}
            <button class="nav-icon-btn" title="Notifications">
                <i class="ti ti-bell"></i>
            </button>

            {{-- Profile avatar --}}
            <a href="{{ route('candidate.profile') }}" class="nav-avatar" title="My Profile">
                {{ strtoupper(substr(auth()->user()->name ?? 'FI', 0, 2)) }}
            </a>

            {{-- ── FRONTEND LOGOUT LINK ── --}}
            <a href="{{ route('landing') }}" class="nav-icon-btn" title="Log Out" style="color: #ef4444; margin-left: 4px; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
                <i class="ti ti-logout"></i>
            </a>
        </div>
    </nav>

    {{-- ── PAGE CONTENT ── --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- ── GLOBAL SCRIPTS ── --}}
    <script>
        // Theme persistence
        const body   = document.getElementById('body-root');
        const label  = document.getElementById('theme-label');
        const saved  = localStorage.getItem('cdna-theme') || 'dark';
        if (saved === 'light') { body.classList.add('light'); label.textContent = 'Light'; }

        function toggleTheme() {
            body.classList.toggle('light');
            const isLight = body.classList.contains('light');
            label.textContent = isLight ? 'Light' : 'Dark';
            localStorage.setItem('cdna-theme', isLight ? 'light' : 'dark');
        }

        // Upload zone helper
        function fileSelected(input, zoneId, nameId, subId) {
            const zone  = document.getElementById(zoneId);
            const nameEl = nameId ? document.getElementById(nameId) : null;
            const subEl  = subId  ? document.getElementById(subId)  : null;
            if (input.files && input.files[0]) {
                const file = input.files[0];
                zone.classList.add('uploaded');
                zone.querySelector('.upload-icon').className = 'upload-icon ti ti-file-check';
                if (nameEl) nameEl.textContent = file.name;
                if (subEl)  subEl.textContent  = (file.size / 1024).toFixed(0) + ' KB — uploaded';
            }
        }

        // Show / hide modal
        function showModal(id)  { document.getElementById(id).style.display = 'flex'; document.body.style.overflow = 'hidden'; }
        function closeModal(id) { document.getElementById(id).style.display = 'none';  document.body.style.overflow = '';       }

        // Show / hide popup (nested)
        function showPopup(id)  { document.getElementById(id).style.display = 'flex'; }
        function closePopup(id) { document.getElementById(id).style.display = 'none'; }

        // Auto-hide toast
        function autoHideToast(id, ms = 4000) {
            setTimeout(() => {
                const el = document.getElementById(id);
                if (el) el.style.display = 'none';
            }, ms);
        }
    </script>
    @stack('scripts')
</body>
</html>