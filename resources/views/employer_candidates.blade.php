
@extends('layouts.employer')

@section('title', 'Candidates')
@section('page-title', 'Talent Matrix Pipeline')
@section('page-sub', 'Review profile indices sorted automatically by real-time AI capability matching.')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
    
    <!-- Candidate Element Card 1 -->
    <div class="card" style="padding: 20px; border-radius: 12px; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
        <span style="position: absolute; top: 15px; right: 15px; background: rgba(245,158,11,0.1); color: var(--primary); font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 20px;">
            91% Match
        </span>
        <div>
            <div style="width: 40px; h: 40px; border-radius: 50%; background: var(--border); display: flex; align-items: center; justify-content: center; font-weight: 600; margin-bottom: 12px;">S</div>
            <h3 style="font-size: 16px; margin: 0 0 4px 0;">Shafiena</h3>
            <div style="color: var(--primary); font-size: 12px; margin-bottom: 12px; font-weight: 500;">Lead Data Systems Specialist</div>
            <p style="color: var(--muted); font-size: 12px; line-height: 1.5; margin-bottom: 15px;">
                Proficient in data pipeline mechanics, enterprise warehousing structures, and processing models coming out of UM tracking.
            </p>
        </div>
        <button class="btn btn-outline" style="width: 100%; font-size: 12px;"><i class="ti ti-eye"></i> Inspect AI Analysis</button>
    </div>

    <!-- Candidate Element Card 2 -->
    <div class="card" style="padding: 20px; border-radius: 12px; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
        <span style="position: absolute; top: 15px; right: 15px; background: rgba(245,158,11,0.1); color: var(--primary); font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 20px;">
            84% Match
        </span>
        <div>
            <div style="width: 40px; h: 40px; border-radius: 50%; background: var(--border); display: flex; align-items: center; justify-content: center; font-weight: 600; margin-bottom: 12px;">AM</div>
            <h3 style="font-size: 16px; margin: 0 0 4px 0;">Alex Mercer</h3>
            <div style="color: var(--primary); font-size: 12px; margin-bottom: 12px; font-weight: 500;">AI Solutions Architect</div>
            <p style="color: var(--muted); font-size: 12px; line-height: 1.5; margin-bottom: 15px;">
                Specialized in scalable LLM engineering architectures, Vector search tracking setups, and API abstraction pipelines.
            </p>
        </div>
        <button class="btn btn-outline" style="width: 100%; font-size: 12px;"><i class="ti ti-eye"></i> Inspect AI Analysis</button>
    </div>

</div>
@endsection