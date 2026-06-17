@extends('layouts.employer') {{-- Change this to match your actual employer layout name --}}

@section('title', 'Dashboard')
@section('page-title', 'Overview Dashboard')
@section('page-sub', 'Live tracking metrics across all corporate hiring pipelines.')

@section('content')
<div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 30px;">
    
    <div class="card metric-card" style="padding: 20px; border-radius: 12px; position: relative;">
        <div style="color: var(--muted); font-size: 12px; font-weight: 600; text-transform: uppercase;">Active Listings</div>
        <div style="font-size: 32px; font-weight: 600; margin: 8px 0; color: var(--text);">4</div>
        <div style="color: var(--primary); font-size: 12px;"><i class="ti ti-arrow-up-right"></i> Live on platform</div>
    </div>

    <div class="card metric-card" style="padding: 20px; border-radius: 12px; position: relative;">
        <div style="color: var(--muted); font-size: 12px; font-weight: 600; text-transform: uppercase;">Total Applicants</div>
        <div style="font-size: 32px; font-weight: 600; margin: 8px 0; color: var(--text);">142</div>
        <div style="color: #10b981; font-size: 12px;"><i class="ti ti-users"></i> +18 new today</div>
    </div>

    <div class="card metric-card" style="padding: 20px; border-radius: 12px; position: relative; border-left: 3px solid var(--primary);">
        <div style="color: var(--primary); font-size: 12px; font-weight: 600; text-transform: uppercase;">AI Match Engine</div>
        <div style="font-size: 32px; font-weight: 600; margin: 8px 0; color: var(--primary);">37</div>
        <div style="color: var(--muted); font-size: 12px;"><i class="ti ti-sparkles"></i> Matched over 85% score</div>
    </div>
</div>

<div class="split-workspace" style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <div class="card" style="padding: 25px; border-radius: 12px;">
        <h3 style="margin-bottom: 20px; font-size: 16px;">Recent Pipeline Activity</h3>
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="border-b: 1px solid var(--border); color: var(--muted);">
                        <th style="padding-bottom: 12px;">Candidate</th>
                        <th style="padding-bottom: 12px;">Applied Position</th>
                        <th style="padding-bottom: 12px; text-center">Score</th>
                        <th style="padding-bottom: 12px; text-align: right;">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 14px 0; font-weight: 500;">Alex Mercer</td>
                        <td style="color: var(--muted);">AI Solutions Architect</td>
                        <td style="text-align: center;"><span style="background: rgba(245,158,11,0.1); color: var(--primary); padding: 4px 8px; rounded: 20px; font-size: 12px; font-weight:600;">84%</span></td>
                        <td style="text-align: right; color: var(--muted); font-size: 12px;">2 hours ago</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 14px 0; font-weight: 500;">Shafiena</td>
                        <td style="color: var(--muted);">Lead Data Systems Specialist</td>
                        <td style="text-align: center;"><span style="background: rgba(245,158,11,0.1); color: var(--primary); padding: 4px 8px; rounded: 20px; font-size: 12px; font-weight:600;">91%</span></td>
                        <td style="text-align: right; color: var(--muted); font-size: 12px;">5 hours ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card" style="padding: 25px; border-radius: 12px; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <h3 style="margin-bottom: 15px; font-size: 16px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
                <i class="ti ti-brain"></i> AI Recruiter Tips
            </h3>
            <p style="font-size: 13px; color: var(--muted); line-height: 1.6;">
                Candidates emerging from regional technology pipelines have shown a 15% increase in verified system processing benchmarks this week. Consider adjusting automated filters to emphasize foundational logic constraints.
            </p>
        </div>
        <button class="btn btn-primary" style="width: 100%; font-size: 12px; margin-top: 20px;">Launch DNA Assessment</button>
    </div>
</div>
@endsection