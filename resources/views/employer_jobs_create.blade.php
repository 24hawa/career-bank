@extends('layouts.employer')

@section('title', 'Post a New Job')
@section('page-title', 'Create Job Listing')
@section('page-sub', 'Deploy structural requirements directly into the AI parsing matching vector system.')

@section('content')
<div class="card" style="padding: 30px; border-radius: 12px; max-width: 800px;">
    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Job posted safely as prototype placeholder!');">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div class="form-group">
                <label class="form-label">Job Title</label>
                <input type="text" class="form-input" placeholder="e.g. Senior Software Architect" required>
            </div>
            <div class="form-group">
                <label class="form-label">Workplace Type</label>
                <select class="form-input">
                    <option>Remote Workspace</option>
                    <option>Hybrid Configuration</option>
                    <option>On-site Corporate Headquarters</option>
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div class="form-group">
                <label class="form-label">Target Core Tech Stack</label>
                <input type="text" class="form-input" placeholder="e.g. Laravel, PHP 8.3, PostgreSQL">
            </div>
            <div class="form-group">
                <label class="form-label">Experience Tier</label>
                <select class="form-input">
                    <option>Entry Level Prototype (0-2 years)</option>
                    <option>Mid-Tier Management (2-5 years)</option>
                    <option>Senior Executive Staff (5+ years)</option>
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label class="form-label">Core Roles & Execution Context</label>
            <textarea class="form-input" rows="6" placeholder="Outline the technological scope, direct system architectural mandates, and structural target vectors required..." style="resize: none;"></textarea>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end;">
            <a href="{{ route('employer.dashboard') }}" class="btn btn-outline" style="text-decoration:none; text-align:center; padding:10px 20px;">Cancel</a>
            <button type="submit" class="btn btn-primary">Deploy Core Listing</button>
        </div>
    </form>
</div>
@endsection