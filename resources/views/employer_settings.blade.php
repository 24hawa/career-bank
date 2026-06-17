@extends('layouts.employer')

@section('title', 'System Settings')
@section('page-title', 'Workspace Configurations')
@section('page-sub', 'Adjust matching notifications, privacy protocols, and automated pipeline parameters.')

@section('content')
<div style="display: grid; grid-template-columns: 1fr; gap: 25px; max-width: 800px;">

    <!-- Card 1: Notifications Configurations -->
    <div class="card" style="padding: 25px; border-radius: 12px;">
        <h3 style="margin: 0 0 8px 0; font-size: 16px; color: var(--text);">Notification Preferences</h3>
        <p style="color: var(--muted); font-size: 13px; margin: 0 0 20px 0;">Configure when and how your team receives talent matching updates.</p>
        
        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <div>
                    <div style="font-size: 14px; font-weight: 500;">Instant Match Alerts</div>
                    <div style="font-size: 12px; color: var(--muted);">Notify via email the second a candidate scores above an 85% match tier.</div>
                </div>
                <input type="checkbox" checked style="accent-color: var(--primary); width: 18px; height: 18px; cursor: pointer;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <div>
                    <div style="font-size: 14px; font-weight: 500;">Weekly Pipeline Summary</div>
                    <div style="font-size: 12px; color: var(--muted);">Receive a condensed structural report of all candidate actions every Monday.</div>
                </div>
                <input type="checkbox" checked style="accent-color: var(--primary); width: 18px; height: 18px; cursor: pointer;">
            </div>
        </div>
    </div>

    <!-- Card 2: Security & Visibility Protocols -->
    <div class="card" style="padding: 25px; border-radius: 12px;">
        <h3 style="margin: 0 0 8px 0; font-size: 16px; color: var(--text);">Recruiting Privacy & Security</h3>
        <p style="color: var(--muted); font-size: 13px; margin: 0 0 20px 0;">Control listing exposure boundaries across public search vectors.</p>

        <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Workspace settings saved!');">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="form-group">
                    <label class="form-label">Application Review Window</label>
                    <select class="form-input">
                        <option>30 Days (Standard)</option>
                        <option>60 Days (Extended)</option>
                        <option>Indefinite Auto-Archiving</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Default Listing Visibility</label>
                    <select class="form-input">
                        <option>Public Indexing (All Search Engines)</option>
                        <option>Internal Talent Stream Pool Only</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Apply Settings</button>
            </div>
        </form>
    </div>

</div>
@endsection