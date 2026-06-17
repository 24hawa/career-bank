@extends('layouts.employer')

@section('title', 'Company Profile')
@section('page-title', 'Corporate Profile Ecosystem')
@section('page-sub', 'Manage parameters governing public corporate identity visibility records.')

@section('content')
<div class="card" style="padding: 30px; border-radius: 12px; max-width: 750px;">
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid var(--border);">
        <div style="width: 70px; height: 70px; border-radius: 12px; bg-color: var(--border); background: #262626; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 700; color: var(--primary); border: 1px dashed var(--primary);">
            AX
        </div>
        <div>
            <h3 style="margin: 0 0 4px 0; font-size: 18px;">Axiata HR Systems</h3>
            <p style="color: var(--muted); font-size: 13px; margin: 0;">Enterprise Communications Vector • Kuala Lumpur, MY</p>
        </div>
    </div>

    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Profile variables updated successfully!');">
        <div class="form-group" style="margin-bottom: 18px;">
            <label class="form-label">Official Corporate Name</label>
            <input type="text" class="form-input" value="Axiata HR Systems Berhad">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 18px;">
            <div class="form-group">
                <label class="form-label">Corporate Domain Web URL</label>
                <input type="url" class="form-input" value="https://www.axiata.com">
            </div>
            <div class="form-group">
                <label class="form-label">Scale Capacity Employee Tier</label>
                <select class="form-input">
                    <option>Scale Level: 1-50 personnel</option>
                    <option>Scale Level: 51-500 personnel</option>
                    <option selected>Enterprise Tier: 500+ global workforce</option>
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label class="form-label">Corporate Manifesto & Operational Overview</label>
            <textarea class="form-input" rows="4" style="resize: none;">Advancing connected digital infrastructures across regional frameworks, matching emerging technical candidates directly into fast-tracked operational roles across strategic pipelines.</textarea>
        </div>

        <div style="display: flex; justify-content: flex-end;">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection