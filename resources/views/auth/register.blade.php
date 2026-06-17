@extends('layouts.auth')
@section('title', 'Create Account')

@section('auth-content')
<div style="background:var(--card);border:1px solid var(--border);border-radius:18px;padding:32px;width:100%;max-width:420px">

    <div style="font-size:20px;font-weight:600;color:var(--text);margin-bottom:4px">Create your account</div>
    <div style="font-size:13px;color:var(--muted);margin-bottom:20px">
        Already have one? <a href="{{ route('login') }}" style="color:#0083A0">Sign in</a>
    </div>

    {{-- Role selector --}}
    <div style="display:flex;gap:0;background:var(--input-bg);border:1px solid var(--border);border-radius:10px;padding:3px;margin-bottom:20px" id="role-tabs">
        <div id="tab-candidate" onclick="setRole('candidate')"
             style="flex:1;text-align:center;padding:8px;border-radius:7px;background:#0083A0;font-size:13px;font-weight:500;color:#0B1A0E;cursor:pointer">
            <i class="ti ti-user" style="font-size:14px;vertical-align:-2px"></i> Candidate
        </div>
        <div id="tab-employer" onclick="setRole('employer')"
             style="flex:1;text-align:center;padding:8px;font-size:13px;color:var(--muted);cursor:pointer">
            <i class="ti ti-building" style="font-size:14px;vertical-align:-2px"></i> Employer
        </div>
    </div>

    {{-- Redirection Gate: Points right back to the login template view --}}
    <form action="{{ route('login') }}" method="GET" id="register-form">
        @csrf
        <input type="hidden" name="role" id="role-input" value="candidate">

        {{-- Shared fields --}}
        <div class="form-group">
            <label class="form-label">Full name *</label>
            <input type="text" name="name" class="form-input" placeholder="e.g. Shafiena Binti Usri"
                   value="{{ old('name') }}" required>
            @error('name')<div style="font-size:11px;color:#E24B4A;margin-top:3px">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email address *</label>
            <input type="email" name="email" class="form-input" placeholder="you@university.edu.my"
                   value="{{ old('email') }}" required>
            @error('email')<div style="font-size:11px;color:#E24B4A;margin-top:3px">{{ $message }}</div>@enderror
        </div>

        {{-- Candidate-only fields --}}
        <div id="candidate-fields">
            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">University *</label>
                    <input type="text" name="university" class="form-input" placeholder="e.g. UPSI"
                           value="{{ old('university') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Field of study *</label>
                    <input type="text" name="field" class="form-input" placeholder="e.g. Software Eng."
                           value="{{ old('field') }}">
                </div>
            </div>
        </div>

        {{-- Employer-only fields --}}
        <div id="employer-fields" style="display:none">
            <div class="form-group">
                <label class="form-label">Company name *</label>
                <input type="text" name="company" class="form-input" placeholder="e.g. Axiata Group"
                       value="{{ old('company') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Industry</label>
                <select name="industry" class="form-select">
                    <option value="">-- Select industry --</option>
                    <option>Technology</option>
                    <option>Banking & Finance</option>
                    <option>Telecommunications</option>
                    <option>Oil & Gas</option>
                    <option>Education</option>
                    <option>Other</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Password *</label>
            <input type="password" name="password" class="form-input" placeholder="Min 8 characters" required>
            @error('password')<div style="font-size:11px;color:#E24B4A;margin-top:3px">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" style="margin-bottom:20px">
            <label class="form-label">Confirm password *</label>
            <input type="password" name="password_confirmation" class="form-input" placeholder="Repeat password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-full">
            <i class="ti ti-user-plus"></i> Create my Career Bank
        </button>

        <div style="text-align:center;font-size:11px;color:var(--muted);margin-top:12px">
            By signing up you agree to our <a href="#" style="color:#0083A0">Terms</a> &amp; <a href="#" style="color:#0083A0">Privacy Policy</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
let currentRole = 'candidate';
function setRole(role) {
    currentRole = role;
    document.getElementById('role-input').value = role;
    const cTab = document.getElementById('tab-candidate');
    const eTab = document.getElementById('tab-employer');
    if (role === 'candidate') {
        cTab.style.cssText = 'flex:1;text-align:center;padding:8px;border-radius:7px;background:#0083A0;font-size:13px;font-weight:500;color:#0B1A0E;cursor:pointer';
        eTab.style.cssText = 'flex:1;text-align:center;padding:8px;font-size:13px;color:var(--muted);cursor:pointer';
        document.getElementById('candidate-fields').style.display = '';
        document.getElementById('employer-fields').style.display = 'none';
        document.querySelector('[type=submit]').innerHTML = '<i class="ti ti-user-plus"></i> Create my Career Bank';
    } else {
        eTab.style.cssText = 'flex:1;text-align:center;padding:8px;border-radius:7px;background:#0083A0;font-size:13px;font-weight:500;color:#0B1A0E;cursor:pointer';
        cTab.style.cssText = 'flex:1;text-align:center;padding:8px;font-size:13px;color:var(--muted);cursor:pointer';
        document.getElementById('candidate-fields').style.display = 'none';
        document.getElementById('employer-fields').style.display = '';
        document.querySelector('[type=submit]').innerHTML = '<i class="ti ti-building"></i> Register as Employer';
    }
}
</script>
@endpush