@extends('layouts.employer')

@section('title', 'My Listings')
@section('page-title', 'Active Listings Management')
@section('page-sub', 'Track corporate roles distributed across public matching indices.')

@section('content')
<div style="display: flex; flex-direction: column; gap: 15px;">
    
    <!-- Active Listing Item 1 -->
    <div class="card" style="padding: 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px;">
                <h3 style="font-size: 16px; margin: 0;">AI Solutions Architect</h3>
                <span style="background: rgba(16,185,129,0.1); color: #10b981; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 600;">Active</span>
            </div>
            <p style="color: var(--muted); font-size: 13px; margin: 0;"><i class="ti ti-map-pin"></i> Remote Work • Posted 3 days ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 30px;">
            <div style="text-align: center;">
                <div style="font-size: 18px; font-weight: 600;">24</div>
                <div style="color: var(--muted); font-size: 11px;">Applicants</div>
            </div>
            <button class="btn btn-outline" style="font-size: 12px;"><i class="ti ti-edit"></i> Edit Board</button>
        </div>
    </div>

    <!-- Active Listing Item 2 -->
    <div class="card" style="padding: 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px;">
                <h3 style="font-size: 16px; margin: 0;">Lead Data Systems Specialist</h3>
                <span style="background: rgba(16,185,129,0.1); color: #10b981; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 600;">Active</span>
            </div>
            <p style="color: var(--muted); font-size: 13px; margin: 0;"><i class="ti ti-map-pin"></i> Hybrid Setup • Posted 1 week ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 30px;">
            <div style="text-align: center;">
                <div style="font-size: 18px; font-weight: 600;">13</div>
                <div style="color: var(--muted); font-size: 11px;">Applicants</div>
            </div>
            <button class="btn btn-outline" style="font-size: 12px;"><i class="ti ti-edit"></i> Edit Board</button>
        </div>
    </div>

</div>
@endsection