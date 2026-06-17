<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Bank — Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    {{-- Inline layout adjustments to structure your native app.css components cleanly --}}
    <style>
        .hero-section { text-align: center; padding: 80px 20px; max-width: 900px; margin: 0 auto; }
        /* Swapped out amber accents for custom cyan borders/background definitions */
        .hero-badge { display: inline-flex; align-items: center; padding: 6px 16px; border-radius: 100px; font-size: 12px; font-weight: 600; margin-bottom: 24px; border: 1px solid rgba(0, 163, 196, 0.2); background: rgba(0, 163, 196, 0.05); color: #00A3C4; }
        .hero-title { font-size: 48px; font-weight: 800; tracking-tight: -0.025em; line-height: 1.15; margin-bottom: 20px; }
        .hero-title span { color: #00A3C4; }
        .hero-sub { font-size: 18px; color: var(--muted); max-width: 650px; margin: 0 auto; line-height: 1.6; }
        
        .gateway-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; max-width: 1200px; margin: -20px auto 80px auto; padding: 0 20px; position: relative; z-index: 10; }
        .gateway-card { display: flex; flex-direction: column; justify-content: space-between; height: 100%; }
        .gateway-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 24px; background: rgba(0, 163, 196, 0.1); color: #00A3C4; border: 1px solid rgba(0, 163, 196, 0.2); }
        .gateway-features { list-style: none; padding: 0; margin: 0 0 30px 0; display: flex; flex-direction: column; gap: 10px; font-size: 14px; }
        .gateway-features li { display: flex; align-items: center; gap: 10px; color: var(--muted); }
        .gateway-features i { color: #00A3C4; font-size: 16px; }
        
        .global-footer { border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 40px 20px; text-align: center; font-size: 14px; color: var(--muted); }
        #body-root.light .hero-badge { background: rgba(0, 163, 196, 0.08); }
    </style>
</head>
<body id="body-root">

    {{-- ── NAVBAR ── --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="nav-logo">
            <div class="nav-mark">CB</div>
            <span class="nav-brand">Career Bank</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('about') }}" class="nav-link">About Us</a>
            <a href="{{ route('login') }}" class="nav-link">Find Jobs</a>
            <a href="{{ route('login') }}" class="nav-link">Career Services</a>
        </div>

        <div class="nav-right">
            {{-- Theme toggle --}}
            <div class="theme-toggle" onclick="toggleTheme()" title="Toggle dark/light mode">
                <div class="toggle-track">
                    <div class="toggle-thumb"></div>
                </div>
                <span class="toggle-label" id="theme-label">Dark</span>
            </div>

            {{-- Plain Prototype Action Triggers --}}
            <a href="{{ route('login') }}" class="nav-link" style="margin-right: 10px; font-weight: 600;">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 13px; text-decoration: none;">Join Ecosystem</a>
        </div>
    </nav>

    {{-- ── HERO SECTION ── --}}
    <header class="hero-section">
        <div class="hero-badge">
            <!-- Icon changed to ti-network and color set to cyan styling rules -->
            <i class="ti ti-network" style="margin-right: 6px; font-size: 14px;"></i> Golden Opportunity: The Unified Talent Network
        </div>
        <h1 class="hero-title">Harvest Your Potential with <span>Career Bank</span></h1>
        <p class="hero-sub">A cyan ecosystem bringing together students, seekers, and enterprises into one thriving, unified forest canopy.</p>
    </header>

    {{-- ── THE 3 DOORS GATEWAY GRID ── --}}
    <main class="gateway-grid">

        <!-- Door 1: Candidates -->
        <div class="card gateway-card">
            <div>
                <div class="gateway-icon"><i class="ti ti-users"></i></div>
                <h3 style="margin: 0 0 10px 0; font-size: 20px;">For Candidates</h3>
                <p style="color: var(--muted); font-size: 14px; line-height: 1.5; margin: 0 0 24px 0;">Deposit your credentials, match with top global employers, and access our career upskilling modules.</p>
                <ul class="gateway-features">
                    <li><i class="ti ti-circle-check"></i> AI Matching Matrix</li>
                    <li><i class="ti ti-circle-check"></i> Skill Growth Pipeline</li>
                </ul>
            </div>
            <a href="{{ route('register') }}" class="btn" style="width: 100%; text-align: center; text-decoration: none; background: rgba(255,255,255,0.05); color: #00A3C4;">Get Started</a>
        </div>

        <!-- Door 2: Employers (Highlighted Center Hub Card) -->
        <div class="card gateway-card" style="border-color: rgba(0, 163, 196, 0.3);">
            <div>
                <div class="gateway-icon" style="background: #00A3C4; color: #000;"><i class="ti ti-briefcase"></i></div>
                <h3 style="margin: 0 0 10px 0; font-size: 20px;">For Employers</h3>
                <p style="color: var(--muted); font-size: 14px; line-height: 1.5; margin: 0 0 24px 0;">Source fresh talent, manage your candidate pipeline, and retain your staff with internal modules.</p>
                <ul class="gateway-features">
                    <li><i class="ti ti-circle-check"></i> ATS Pipeline Matrix</li>
                    <li><i class="ti ti-circle-check"></i> Retention Workspace</li>
                </ul>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary" style="width: 100%; text-align: center; text-decoration: none;">Recruit Now</a>
        </div>

        <!-- Door 3: Universities -->
        <div class="card gateway-card">
            <div>
                <div class="gateway-icon"><i class="ti ti-school"></i></div>
                <h3 style="margin: 0 0 10px 0; font-size: 20px;">For Universities</h3>
                <p style="color: var(--muted); font-size: 14px; line-height: 1.5; margin: 0 0 24px 0;">Bridge the gap between graduation and employment. Track alumni and empower your students.</p>
                <ul class="gateway-features">
                    <li><i class="ti ti-circle-check"></i> Alumni Network Tracking</li>
                    <li><i class="ti ti-circle-check"></i> Industry Partner Pools</li>
                </ul>
            </div>
            <a href="{{ route('register') }}" class="btn" style="width: 100%; text-align: center; text-decoration: none; background: rgba(255,255,255,0.05); color: #00A3C4;">Connect Now</a>
        </div>

    </main>

    {{-- ── FOOTER ── --}}
    <footer class="global-footer">
        &copy; {{ date('Y') }} Career Bank. Harvesting talent and unifying ecosystems. Tech Catalyst@UPSI
    </footer>

    {{-- ── CONTROL SCRIPTS ── --}}
    <script>
        const body  = document.getElementById('body-root');
        const label = document.getElementById('theme-label');
        const saved = localStorage.getItem('cdna-theme') || 'dark';
        if (saved === 'light') { body.classList.add('light'); if(label) label.textContent = 'Light'; }

        function toggleTheme() {
            body.classList.toggle('light');
            const isLight = body.classList.contains('light');
            if(label) label.textContent = isLight ? 'Light' : 'Dark';
            localStorage.setItem('cdna-theme', isLight ? 'light' : 'dark');
        }
    </script>
</body>
</html>