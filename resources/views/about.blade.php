<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Bank — About Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    {{-- Unified Layout styling to cleanly mirror landing page proportions --}}
    <style>
        .about-hero { text-align: center; padding: 80px 20px; max-width: 900px; margin: 0 auto; }
        .about-badge { display: inline-flex; align-items: center; padding: 6px 16px; border-radius: 100px; font-size: 12px; font-weight: 600; margin-bottom: 24px; border: 1px solid rgba(217, 119, 6, 0.2); background: rgba(217, 119, 6, 0.05); color: #f59e0b; text-transform: uppercase; letter-spacing: 0.05em; }
        .about-title { font-size: 48px; font-weight: 800; tracking-tight: -0.025em; line-height: 1.15; margin-bottom: 20px; color: #fff; }
        #body-root.light .about-title { color: #111827; }
        .about-title span { color: #f59e0b; }
        .about-sub { font-size: 18px; color: var(--muted); max-width: 700px; margin: 0 auto; line-height: 1.6; }
        
        .content-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        .vision-section { display: grid; grid-template-columns: 1fr; gap: 40px; padding: 48px; border-radius: 16px; margin-bottom: 60px; }
        @media (min-width: 768px) { .vision-section { grid-template-columns: 1.2fr 0.8fr; } }
        
        .vision-text h2 { font-size: 28px; font-weight: 700; margin: 0 0 16px 0; }
        .vision-text h2 span { color: #f59e0b; }
        .vision-text p { color: var(--muted); line-height: 1.6; font-size: 15px; margin-bottom: 20px; }
        
        .vision-mini-grid { display: grid; grid-template-columns: 1fr; gap: 20px; }
        @media (min-width: 480px) { .vision-mini-grid { grid-template-columns: 1fr 1fr; } }
        
        .mini-card { padding: 24px; border-radius: 12px; background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.04); }
        .mini-icon { font-size: 24px; color: #f59e0b; margin-bottom: 12px; }
        .mini-card h4 { margin: 0 0 6px 0; font-size: 15px; font-weight: 600; }
        .mini-card p { margin: 0; font-size: 12px; color: var(--muted); line-height: 1.5; }

        .pillars-header { text-align: center; margin-bottom: 40px; }
        .pillars-header h2 { font-size: 32px; font-weight: 800; margin: 0 0 8px 0; }
        .pillars-header p { margin: 0; font-size: 14px; color: var(--muted); }
        
        .pillars-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; margin-bottom: 80px; }
        .pillar-card { display: flex; flex-direction: column; justify-content: space-between; padding: 28px; height: 100%; }
        .pillar-module { font-family: monospace; font-size: 11px; font-weight: 700; color: #f59e0b; letter-spacing: 0.1em; display: block; margin-bottom: 8px; }
        .pillar-card h3 { margin: 0 0 12px 0; font-size: 18px; font-weight: 700; }
        .pillar-card p { margin: 0; font-size: 13px; color: var(--muted); line-height: 1.6; }
        .pillar-icon { text-align: right; font-size: 24px; color: rgba(245, 158, 11, 0.2); margin-top: 24px; }
        
        .global-footer { border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 40px 20px; text-align: center; font-size: 14px; color: var(--muted); }
        #body-root.light .about-badge { background: rgba(217, 119, 6, 0.08); }
        #body-root.light .mini-card { background: rgba(0, 0, 0, 0.02); border-color: rgba(0, 0, 0, 0.04); }
    </style>
</head>
<body id="body-root">

    {{-- ── NAVBAR ── --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="nav-logo">
            <div class="nav-mark">CD</div>
            <span class="nav-brand">Career Bank</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('about') }}" class="nav-link active">About Us</a>
            <a href="{{ route('candidate.job.home') }}" class="nav-link">Find Jobs</a>
            <a href="/employer" class="nav-link">Career Services</a>
        </div>

        <div class="nav-right">
            {{-- Theme toggle --}}
            <div class="theme-toggle" onclick="toggleTheme()" title="Toggle dark/light mode">
                <div class="toggle-track">
                    <div class="toggle-thumb"></div>
                </div>
                <span class="toggle-label" id="theme-label">Dark</span>
            </div>

            <a href="{{ route('login') }}" class="nav-link" style="margin-right: 10px; font-weight: 600;">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 13px; text-decoration: none;">Join Ecosystem</a>
        </div>
    </nav>

    {{-- ── HERO SECTION ── --}}
    <header class="about-hero">
        <div class="about-badge">
            <i class="ti ti-layers-linked" style="margin-right: 6px; font-size: 14px;"></i> Architecture Matrix
        </div>
        <h1 class="about-title">Nurturing the Future of <span>Global Talent</span></h1>
        <p class="about-sub">Traditional job sites are transactional. We built a complete lifestyle lifecycle network ecosystem where educational data paths, precise candidate tracking, and corporate growth cross-pollinate seamlessly.</p>
    </header>

    {{-- ── MAIN STRUCTURAL CONTENT ── --}}
    <main class="content-container">

        {{-- Vision Section --}}
        <section class="card vision-section">
            <div class="vision-text">
                <h2>Why <span>"Career Bank"</span>?</h2>
                <p>A bank is a structure where you securely manage assets so they appreciate over time. Your skills, qualifications, and experiential history are the most valuable professional assets you own.</p>
                <p>We provide the modern infrastructure to deposit those assets early during your student days, leverage them through automated profile indexing, and constantly harvest dividends through continuous upskilling.</p>
            </div>
            
            <div class="vision-mini-grid">
                <div class="mini-card">
                    <div class="mini-icon"><i class="ti ti-dna"></i></div>
                    <h4>Early Staging</h4>
                    <p>We sync data early at the university cohort level to optimize engineering foundations.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-icon"><i class="ti ti-trending-up"></i></div>
                    <h4>High Value</h4>
                    <p>We optimize placement workflows and clear matching friction for HR pipelines.</p>
                </div>
            </div>
        </section>

        {{-- 4 Pillars Section --}}
        <section>
            <div class="pillars-header">
                <h2>Our 4 Pillars of Growth</h2>
                <p>How our unified application modules manage the complete data lifecycle.</p>
            </div>

            <div class="pillars-grid">
                <!-- Module 01 -->
                <div class="card pillar-card">
                    <div>
                        <span class="pillar-module">MODULE 01</span>
                        <h3>Universities</h3>
                        <p>Funnels fresh student cohorts into corporate visibility pools using verified pipeline performance metrics.</p>
                    </div>
                    <div class="pillar-icon"><i class="ti ti-building-community"></i></div>
                </div>

                <!-- Module 02 -->
                <div class="card pillar-card">
                    <div>
                        <span class="pillar-module">MODULE 02</span>
                        <h3>Candidates</h3>
                        <p>Equips active talent with an interactive interface dashboard matrix to match into high-fit options.</p>
                    </div>
                    <div class="pillar-icon"><i class="ti ti-user-circle"></i></div>
                </div>

                <!-- Module 03 -->
                <div class="card pillar-card">
                    <div>
                        <span class="pillar-module">MODULE 03</span>
                        <h3>Employers</h3>
                        <p>Provides HR teams with robust workspace filtering metrics to index, screen, and select candidate applications.</p>
                    </div>
                    <div class="pillar-icon"><i class="ti ti-briefcase"></i></div>
                </div>

                <!-- Module 04 -->
                <div class="card pillar-card">
                    <div>
                        <span class="pillar-module">MODULE 04</span>
                        <h3>Employees</h3>
                        <p>The internal platform tracking ongoing corporate training operations directly within company operations.</p>
                    </div>
                    <div class="pillar-icon"><i class="ti ti-layers-intersect"></i></div>
                </div>
            </div>
        </section>

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