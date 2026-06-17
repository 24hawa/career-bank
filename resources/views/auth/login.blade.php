@extends('layouts.auth')
@section('title', 'Sign In')

@section('auth-content')
<div style="background:var(--card);border:1px solid var(--border);border-radius:18px;padding:32px;width:100%;max-width:380px">
    <div style="font-size:20px;font-weight:600;color:var(--text);margin-bottom:4px">Welcome back</div>
    <div style="font-size:13px;color:var(--muted);margin-bottom:24px">
        Don't have an account? <a href="{{ route('register') }}" style="color:#0083A0">Create one</a>
    </div>

    @if(session('status'))
        <div style="background:var(--have-bg);border:1px solid rgba(59,109,17,0.2);border-radius:8px;padding:10px 14px;font-size:12px;color:#3B6D11;margin-bottom:16px">
            {{ session('status') }}
        </div>
    @endif

    {{-- Fallback default action points to candidate --}}
    <form action="/candidate/job/home" method="GET">
        @csrf
        <div class="form-group">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-input" placeholder="you@email.com"
                   value="{{ old('email') }}" required autofocus>
            @error('email')<div style="font-size:11px;color:#E24B4A;margin-top:3px">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" style="margin-bottom:10px">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            @error('password')<div style="font-size:11px;color:#E24B4A;margin-top:3px">{{ $message }}</div>@enderror
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
            <label style="display:flex;align-items:center;gap:7px;font-size:12px;color:var(--muted);cursor:pointer">
                <input type="checkbox" name="remember"> Remember me
            </label>
            @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="font-size:12px;color:#0083A0">Forgot password?</a>
            @endif
        </div>

        {{-- BUTTON 1: Redirects to candidate dashboard --}}
        <button type="submit" formaction="/candidate/job/home" class="btn btn-primary btn-full" style="margin-bottom: 10px;">
            <i class="ti ti-login"></i> Sign in As Candidate
        </button>
        
        {{-- BUTTON 2: Redirects to employer portal dashboard --}}
        <button type="submit" formaction="/employer" class="btn btn-outline btn-full">
            <i class="ti ti-briefcase"></i> Sign in As Employer
        </button>
        
    </form>
</div>
@endsection