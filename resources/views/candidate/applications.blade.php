@extends('layouts.candidate')
@section('title', 'My Applications')

@section('content')
<div class="page">

    {{-- PAGE HEADER MODULE --}}
    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 600; color: var(--text); margin-bottom: 4px;">My Applications</h1>
            <p style="font-size: 14px; color: var(--muted);">Track all your job applications and monitor your status live.</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; font-size: 13px;">
            <i class="ti ti-home" style="font-size: 15px;"></i> Back to Home
        </a>
    </div>

    {{-- SEARCH & FILTER BAR CARD --}}
    <div class="card" style="padding: 16px; margin-bottom: 20px;">
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <div style="position: relative; flex: 1; min-width: 240px;">
                <i class="ti ti-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--muted); font-size: 16px;"></i>
                <input class="form-input" type="text" placeholder="Search jobs or companies..." id="search-input" oninput="searchApps(this.value)" style="padding-left: 36px; width: 100%;">
            </div>
            
            <div style="display: flex; gap: 8px; flex-wrap: wrap; align-items: center; margin-left: auto;">
                <button class="btn {{ $currentFilter == 'all' ? 'btn-primary' : 'btn-outline' }}" onclick="window.location='{{ route('applications.index') }}'" style="padding: 6px 12px; font-size: 12px;">All</button>
                <button class="btn {{ $currentFilter == 'pending' ? 'btn-primary' : 'btn-outline' }}" onclick="window.location='{{ route('applications.index') }}?filter=pending'" style="padding: 6px 12px; font-size: 12px;">Pending</button>
                <button class="btn {{ $currentFilter == 'reviewed' ? 'btn-primary' : 'btn-outline' }}" onclick="window.location='{{ route('applications.index') }}?filter=reviewed'" style="padding: 6px 12px; font-size: 12px;">Under Review</button>
                <button class="btn {{ $currentFilter == 'accepted' ? 'btn-primary' : 'btn-outline' }}" onclick="window.location='{{ route('applications.index') }}?filter=accepted'" style="padding: 6px 12px; font-size: 12px;">Accepted</button>
                
                <span class="result-count" style="font-size: 13px; color: var(--muted); margin-left: 8px; font-weight: 500;">
                    Showing {{ $applications->count() }} application{{ $applications->count() != 1 ? 's' : '' }}
                </span>
            </div>
        </div>
    </div>

    {{-- APP PERFORMANCE STATS MATRIX --}}
    <div class="grid-2" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 24px;">
        <div class="card" style="padding: 16px; text-align: center; background: var(--bg-light, rgba(0,0,0,0.01));">
            <div style="font-size: 28px; font-weight: 600; color: var(--text);">{{ $stats['total'] }}</div>
            <div style="font-size: 12px; color: var(--muted); font-weight: 500; text-transform: uppercase; margin-top: 2px;">Total Applied</div>
        </div>
        <div class="card" style="padding: 16px; text-align: center; border-left: 3px solid #f97316;">
            <div style="font-size: 28px; font-weight: 600; color: #f97316;">{{ $stats['pending'] }}</div>
            <div style="font-size: 12px; color: var(--muted); font-weight: 500; text-transform: uppercase; margin-top: 2px;">Pending</div>
        </div>
        <div class="card" style="padding: 16px; text-align: center; border-left: 3px solid #22c55e;">
            <div style="font-size: 28px; font-weight: 600; color: #22c55e;">{{ $stats['accepted'] }}</div>
            <div style="font-size: 12px; color: var(--muted); font-weight: 500; text-transform: uppercase; margin-top: 2px;">Accepted</div>
        </div>
        <div class="card" style="padding: 16px; text-align: center; border-left: 3px solid #3b82f6;">
            <div style="font-size: 28px; font-weight: 600; color: #3b82f6;">{{ $stats['reviewed'] }}</div>
            <div style="font-size: 12px; color: var(--muted); font-weight: 500; text-transform: uppercase; margin-top: 2px;">Under Review</div>
        </div>
    </div>

    {{-- APPLICATIONS CONTENT ENGINE --}}
    <div id="app-list" style="display: flex; flex-direction: column; gap: 16px;">
        @forelse($applications as $app)
        <div class="card app-card" style="padding: 20px; transition: transform 0.2s; position: relative;">
            
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; gap: 12px;">
                <div style="display: flex; gap: 14px; align-items: center;">
                    <div style="width: 44px; height: 44px; border-radius: 8px; background: rgba(0,0,0,0.03); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; color: {{ $app->company_color ?? '#C89B00' }};">
                        {{ strtoupper(substr($app->company_name, 0, 2)) }}
                    </div>
                    <div>
                        <h3 class="job-title" style="font-size: 16px; font-weight: 600; color: var(--text); margin-bottom: 2px;">{{ $app->job_title }}</h3>
                        <div class="company-name" style="font-size: 13px; color: var(--muted); font-weight: 500;">{{ $app->company_name }}</div>
                    </div>
                </div>

                {{-- Status Badges mapped to system metrics --}}
                @if($app->status == 'pending')
                    <span class="badge" style="background: #fff7ed; color: #c2410c; border: 1px solid #ffedd5; font-size: 11px; font-weight: 600;"><i class="ti ti-clock"></i> Pending</span>
                @elseif($app->status == 'reviewed')
                    <span class="badge" style="background: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; font-size: 11px; font-weight: 600;"><i class="ti ti-eye"></i> Under Review</span>
                @elseif($app->status == 'accepted')
                    <span class="badge" style="background: #f0fdf4; color: #15803d; border: 1px solid #dcfce7; font-size: 11px; font-weight: 600;"><i class="ti ti-check"></i> Accepted</span>
                @else
                    <span class="badge" style="background: #fef2f2; color: #b91c1c; border: 1px solid #fee2e2; font-size: 11px; font-weight: 600;"><i class="ti ti-x"></i> Rejected</span>
                @endif
            </div>

            {{-- Metadata Row --}}
            <div style="display: flex; gap: 20px; margin-bottom: 16px; font-size: 13px; color: var(--text); flex-wrap: wrap; padding-left: 2px;">
                <span style="display: inline-flex; align-items: center; gap: 5px;"><i class="ti ti-map-pin" style="color: var(--muted);"></i> {{ $app->location }}</span>
                <span style="display: inline-flex; align-items: center; gap: 5px;"><i class="ti ti-briefcase" style="color: var(--muted);"></i> {{ $app->job_type }}</span>
                <span style="display: inline-flex; align-items: center; gap: 5px;"><i class="ti ti-cash" style="color: var(--muted);"></i> {{ $app->salary_range }}</span>
            </div>

            {{-- Footer Action Bar --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 14px; flex-wrap: wrap; gap: 10px;">
                <div style="display: flex; gap: 8px;">
                    <a href="#" class="btn btn-outline" style="padding: 6px 12px; font-size: 12px; display: inline-flex; align-items: center; gap: 4px;">
                        <i class="ti ti-eye"></i> Details
                    </a>
                    
                    @if($app->status == 'pending')
                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline" style="padding: 6px 12px; font-size: 12px; color: #dc2626; border-color: rgba(220,38,38,0.2); display: inline-flex; align-items: center; gap: 4px;">
                            <i class="ti ti-x"></i> Withdraw
                        </button>
                    </form>
                    @endif
                </div>

                <span style="font-size: 12px; color: var(--muted); display: inline-flex; align-items: center; gap: 4px; font-weight: 500;">
                    <i class="ti ti-calendar"></i> Applied {{ $app->created_at->format('d M Y') }}
                </span>
            </div>

        </div>
        @empty
        <div class="card" style="text-align: center; padding: 48px 20px; border: 1px dashed var(--border);">
            <i class="ti ti-file-description" style="font-size: 40px; color: var(--muted); margin-bottom: 12px; display: block;"></i>
            <h3 style="font-size: 16px; font-weight: 600; color: var(--text); margin-bottom: 4px;">No applications found</h3>
            <p style="font-size: 14px; color: var(--muted); margin-bottom: 16px;">You haven't submitted any job entries matching this filter sequence.</p>
            <a href="/candidate/jobs" class="btn btn-primary" style="padding: 8px 16px; font-size: 13px;">
                <i class="ti ti-search"></i> Find Jobs
            </a>
        </div>
        @endforelse
    </div>

</div>
@endsection

@push('scripts')
<script>
function searchApps(val) {
    const cards = document.querySelectorAll('.app-card');
    let count = 0;
    cards.forEach(card => {
        const title = card.querySelector('.job-title').textContent.toLowerCase();
        const company = card.querySelector('.company-name').textContent.toLowerCase();
        const match = !val || title.includes(val.toLowerCase()) || company.includes(val.toLowerCase());
        card.style.display = match ? 'block' : 'none';
        if (match) count++;
    });
    document.querySelector('.result-count').textContent =
        'Showing ' + count + ' application' + (count !== 1 ? 's' : '');
}
</script>
@endpush