@extends('layouts.candidate')
@section('title', 'Find Jobs')

@section('content')

{{-- ── SEARCH & FILTER HERO BAR ── --}}
<div class="search-section">
    <i class="ti ti-search" style="font-size:18px;color:var(--muted);flex-shrink:0"></i>
    <input type="text" class="search-input" id="job-search"
           placeholder="Search jobs, skills, companies..."
           value="{{ request('q', request('career') ? ucwords(str_replace('-',' ', request('career'))) : '') }}">
    <select class="search-select">
        <option value="">All locations</option>
        <option>Kuala Lumpur</option>
        <option>Selangor</option>
        <option>Penang</option>
        <option>Johor Bahru</option>
        <option>Remote</option>
    </select>
    <button class="search-btn">
        <i class="ti ti-search"></i> Search
    </button>
</div>

{{-- ── REDIRECT TOAST (DYNAMIC FROM CAREER PROFILE IDENTIFICATION) ── --}}
@if(request('career'))
<div class="toast" id="redirect-toast">
    <i class="ti ti-check" style="font-size:16px;color:#C89B00;flex-shrink:0"></i>
    <div>
        <div class="toast-title">Redirected from Career Identify</div>
        <div class="toast-sub">Showing jobs matching your Career Bank — {{ ucwords(str_replace('-',' ', request('career'))) }}</div>
    </div>
    <span class="toast-close" onclick="document.getElementById('redirect-toast').style.display='none'">
        <i class="ti ti-x"></i>
    </span>
</div>
<script>autoHideToast('redirect-toast', 5000);</script>
@endif

<div class="page">
    
    {{-- QUICK FILTER CHIPS --}}
    <div class="filter-chips">
        <div class="filter-chip active">All jobs</div>
        <div class="filter-chip @if(request('career')) active @endif">
            @if(request('career'))
                <i class="ti ti-dna" style="font-size:11px"></i>
                {{ ucwords(str_replace('-',' ', request('career'))) }} match
            @else
                Best match
            @endif
        </div>
        <div class="filter-chip">Full time</div>
        <div class="filter-chip">Internship</div>
        <div class="filter-chip">Remote</div>
        <div class="filter-chip">Fresh grad</div>
    </div>

    {{-- MAIN LAYOUT SPLIT --}}
    <div class="grid-2" style="grid-template-columns: 2fr 1fr; gap: 24px">

        {{-- LEFT COLUMN: JOB LISTINGS --}}
        <div>
            <div style="font-size:13px;color:var(--muted);margin-bottom:14px">
                Showing <strong style="color:var(--text)">3 jobs</strong>
                @if(request('career'))
                    matched to your Career Bank
                    &nbsp;<span class="badge badge-gold"><i class="ti ti-dna" style="font-size:10px"></i> {{ ucwords(str_replace('-',' ', request('career'))) }}</span>
                @else
                    — sorted by best Career Bank match
                @endif
            </div>

            @php
            $jobs = [
                ['title'=>'Software Engineer — Backend','company'=>'Axiata Group','location'=>'Kuala Lumpur','salary'=>'RM 5,000 – 8,000','type'=>'Full time','match'=>88,'chips'=>['Python','Django','AWS'],'status'=>'Hiring now'],
                ['title'=>'Mobile Developer (Flutter)','company'=>'Telekom Malaysia','location'=>'Selangor','salary'=>'RM 4,500 – 7,000','type'=>'Full time','match'=>95,'chips'=>['Flutter','Firebase','Dart'],'status'=>'Hiring now'],
                ['title'=>'Junior Software Developer','company'=>'Maybank','location'=>'Kuala Lumpur','salary'=>'RM 3,500 – 5,000','type'=>'Fresh grad','match'=>78,'chips'=>['Python','Laravel','Git'],'status'=>'Urgent'],
            ];
            @endphp

            @foreach($jobs as $job)
            <div class="job-card">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px">
                    <div style="flex:1">
                        <div class="job-title">{{ $job['title'] }}</div>
                        <div class="job-company">
                            <i class="ti ti-building" style="font-size:11px"></i> {{ $job['company'] }}
                            &nbsp;·&nbsp;<i class="ti ti-map-pin" style="font-size:11px"></i> {{ $job['location'] }}
                            &nbsp;·&nbsp;<i class="ti ti-currency-dollar" style="font-size:11px"></i> {{ $job['salary'] }}
                        </div>
                        <div style="margin-top:8px">
                            @foreach($job['chips'] as $chip)
                                <span class="chip">{{ $chip }}</span>
                            @endforeach
                        </div>
                    </div>
                    
                    {{-- Match Progress Ring --}}
                    <div style="text-align:center;flex-shrink:0">
                        <svg width="52" height="52" viewBox="0 0 52 52">
                            <circle cx="26" cy="26" r="21" fill="none" stroke="var(--border)" stroke-width="4"/>
                            <circle cx="26" cy="26" r="21" fill="none" stroke="#C89B00" stroke-width="4"
                                    stroke-dasharray="{{ $job['match'] * 1.32 }} 132"
                                    stroke-dashoffset="33" stroke-linecap="round"/>
                            <text x="26" y="30" text-anchor="middle" font-size="10" font-weight="600" fill="#C89B00">{{ $job['match'] }}%</text>
                        </svg>
                        <div style="font-size:10px;color:var(--muted)">match</div>
                    </div>
                </div>
                
                {{-- Card Actions --}}
                <div class="job-footer">
                    <div style="display:flex;gap:6px">
                        <span class="badge badge-info">{{ $job['type'] }}</span>
                        <span class="badge badge-success">{{ $job['status'] }}</span>
                    </div>
                    <div style="display:flex;gap:8px">
                        <button class="btn btn-outline btn-sm">
                            <i class="ti ti-heart"></i>
                        </button>
                        <button class="btn btn-primary btn-sm">
                            <i class="ti ti-send"></i> Apply
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- RIGHT COLUMN: SIDEBAR FILTERS --}}
        <div>
            <div class="card" style="margin-bottom:14px">
                <div class="card-title"><i class="ti ti-adjustments"></i> Filters</div>
                
                <div style="margin-bottom:14px">
                    <div class="form-label" style="margin-bottom:8px">Job type</div>
                    @foreach(['Full time','Part time','Internship','Remote'] as $i => $type)
                    <label style="display:flex;align-items:center;gap:8px;font-size:13px;color:var(--muted);margin-bottom:6px;cursor:pointer">
                        <input type="checkbox" {{ $i === 0 ? 'checked' : '' }}> {{ $type }}
                    </label>
                    @endforeach
                </div>
                
                <div class="form-group">
                    <label class="form-label">Min salary</label>
                    <input type="text" class="form-input" placeholder="e.g. RM 3,000">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Experience level</label>
                    <select class="form-select">
                        <option>Fresh grad</option>
                        <option>0-2 years</option>
                        <option>2-5 years</option>
                    </select>
                </div>
                
                <div class="form-group" style="margin-bottom:14px">
                    <label class="form-label">Minimum match score</label>
                    <select class="form-select">
                        <option>Any match</option>
                        <option selected>70% and above</option>
                        <option>80% and above</option>
                        <option>90% and above</option>
                    </select>
                </div>
                
                @if(request('career'))
                <div class="form-group" style="margin-bottom:14px">
                    <label class="form-label">Career Bank filter</label>
                    <div style="background:rgba(200,155,0,0.1);border:1px solid #C89B00;border-radius:8px;padding:10px 12px;display:flex;align-items:center;justify-content:space-between;font-size:13px;color:#C89B00">
                        <span><i class="ti ti-dna" style="font-size:13px"></i> {{ ucwords(str_replace('-',' ', request('career'))) }}</span>
                        <a href="{{ route('candidate.jobs') }}" style="color:var(--muted);font-size:12px"><i class="ti ti-x"></i></a>
                    </div>
                </div>
                @endif
                
                <button class="btn btn-primary btn-full">
                    <i class="ti ti-check"></i> Apply filters
                </button>
            </div>

            {{-- INSIGHTS CONTEXT BOX --}}
            <div class="ai-box">
                <i class="ti ti-robot ai-box-icon"></i>
                <div>
                    <div class="ai-box-title">AI tip</div>
                    <div class="ai-box-text">
                        Telekom Malaysia Flutter Dev is your highest match at 95%! Your 3 Flutter projects make you a standout candidate.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection