<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Bank — @yield('title', 'Sign In')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body id="body-root" style="min-height:100vh; display:flex; flex-direction:column;">

    {{-- TOP NAVBAR MODULE --}}
    <header style="width: 100%; border-bottom: 1px solid var(--border); background: var(--card); padding: 14px 24px; position: fixed; top: 0; left: 0; z-index: 1000; height: 65px; display: flex; align-items: center;">
        <div style="width: 100%; max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            
            {{-- Left Side: Brand Logo --}}
            <a href="/" style="font-size: 18px; font-weight: 700; color: var(--text); text-decoration: none; display: flex; align-items: center; gap: 8px;">
                <span style="color: #C89B00;">Career</span>Bank
            </a>

            {{-- Right Side: Navigation Links --}}
            <nav style="display: flex; align-items: center; gap: 20px;">
                <a href="/" style="font-size: 14px; color: var(--text); text-decoration: none; font-weight: 500;">Home</a>
                <a href="/#features" style="font-size: 14px; color: var(--muted); text-decoration: none; font-weight: 500;">Features</a>
                <a href="{{ route('register') }}" class="btn btn-outline" style="padding: 6px 12px; font-size: 13px;">Sign Up</a>
            </nav>

        </div>
    </header>

    {{-- MAIN CORE SPLIT WRAPPER --}}
    <div style="display:flex; width:100%; flex:1; padding-top:65px; min-height:calc(100vh - 65px)">

        {{-- LEFT PANEL --}}
        <div style="width:360px; background:#0B1A0E; padding:40px 36px; display:flex; flex-direction:column; justify-content:center; flex-shrink:0">
            <div style="margin-bottom:32px">
                <div style="width:40px; height:40px; border-radius:10px; background:#C89B00; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; color:#0B1A0E; margin-bottom:14px">CD</div>
                <div style="font-size:22px; font-weight:600; color:#fff; margin-bottom:8px">Career Bank</div>
                <div style="font-size:13px; color:rgba(255,255,255,0.45); line-height:1.8">
                    The living career profile that grows with you — from Day 1 of university to 10 years after graduation.
                </div>
            </div>

            <div style="margin-bottom:10px; font-size:11px; color:rgba(200,155,0,0.8); font-weight:500; text-transform:uppercase; letter-spacing:1px">Why join?</div>
            @foreach([
                'AI-powered career matching',
                'Live skill gap analysis',
                'Connect to 10,000+ employers',
                'Auto-build your CV from transcript',
                'Track applications in one place'
            ] as $feature)
            <div style="display:flex; align-items:center; gap:10px; font-size:13px; color:rgba(255,255,255,0.45); margin-bottom:8px">
                <i class="ti ti-check" style="color:#C89B00; font-size:14px; flex-shrink:0"></i> {{ $feature }}
            </div>
            @endforeach
        </div>

        {{-- RIGHT PANEL --}}
        <div style="flex:1; background:var(--bg); display:flex; align-items:center; justify-content:center; padding:40px 20px">
            @yield('auth-content')
        </div>

    </div>

<script>
    const body = document.getElementById('body-root');
    const saved = localStorage.getItem('cdna-theme') || 'dark';
    if (saved === 'light') body.classList.add('light');
</script>
</body>
</html>