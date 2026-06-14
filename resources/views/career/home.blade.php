@extends('layouts.app')

@section('content')

<div class="welcome-title">Welcome back, Shafiena 👋</div>
<div class="welcome-sub">What would you like to do today?</div>

<div class="home-grid">

    {{-- Step 1 --}}
    <div class="home-card highlight">
        <span class="ai-badge-card">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            AI-powered
        </span>
        <div class="card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
        </div>
        <div class="step-label">Step 1</div>
        <div class="card-title">Identify Career</div>
        <div class="card-desc">Upload your academic transcript. AI will scan and detect the most suitable careers based on your academic background, skills, and experience.</div>
        <a href="#" class="go-btn">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            Go
        </a>
    </div>

    {{-- Step 2 --}}
    <div class="home-card">
        <div class="card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <div class="step-label">Step 2</div>
        <div class="card-title">Find Jobs</div>
        <div class="card-desc">Search and browse job listings matched to your Career DNA profile. Filter by location, salary, and job type.</div>
        <a href="#" class="go-btn-ghost">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            Go
        </a>
    </div>

    {{-- Step 3 — Career Guidance --}}
    <div class="home-card">
        <div class="card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </div>
        <div class="step-label">Step 3</div>
        <div class="card-title">Career Guidance</div>
        <div class="card-desc">View your AI-matched career results ranked by compatibility score. See what skills you have and what you still need.</div>
        <a href="{{ route('guidance.index') }}" class="go-btn-ghost">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            Go
        </a>
    </div>

    {{-- Step 4 --}}
    <div class="home-card">
        <div class="card-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="step-label">Step 4</div>
        <div class="card-title">My Applications</div>
        <div class="card-desc">Track all your job applications. See which employers have viewed your profile and monitor your application status.</div>
        <a href="#" class="go-btn-ghost">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            Go
        </a>
    </div>

</div>

{{-- DNA Bar --}}
<div class="dna-bar">
    <div class="dna-circle">
        <span class="dna-pct">82%</span>
    </div>
    <div class="dna-info">
        <div class="dna-title">Your Career DNA — Software Developer</div>
        <div class="dna-meta">Last updated 3 days ago &nbsp;·&nbsp; 4 skills verified &nbsp;·&nbsp; 3 skills to learn</div>
    </div>
    <div class="dna-actions">
        <a href="{{ route('guidance.index') }}" class="go-btn" style="font-size:12px;padding:8px 14px">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
            Re-scan
        </a>
        <a href="{{ route('guidance.index') }}" class="go-btn-ghost" style="font-size:12px;padding:7px 14px">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            View matches
        </a>
    </div>
</div>

@endsection
