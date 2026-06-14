<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Guidance — Career DNA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">
        <div class="nav-logo-box">CD</div>
        <span class="nav-brand-name">Career DNA</span>
    </div>
    <div class="nav-center">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
        <a href="#" class="nav-link">Find Jobs</a>
        <a href="{{ route('guidance.index') }}" class="nav-link {{ request()->routeIs('guidance.*') ? 'active' : '' }}">Career Matches</a>
        <a href="#" class="nav-link">Applications</a>
    </div>
    <div class="nav-right">
        <div class="toggle-wrap">
            <div class="toggle-pill"></div>
            <span class="toggle-label">Dark</span>
        </div>
        <div class="bell-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <div class="avatar">FI</div>
    </div>
</nav>

<main class="main-content">
    @yield('content')
</main>

@stack('scripts')
</body>
</html>
