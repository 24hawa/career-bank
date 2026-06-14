@extends('layouts.app')

@section('content')

<div class="pg-label">Analysis complete</div>
<div class="pg-title">Your Career Match Report</div>
<div class="pg-sub">Here's your compatibility score and personalised guidance.</div>

<div class="result-card">

    {{-- Header --}}
    <div class="res-head">
        <div class="res-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
        </div>
        <div class="res-title">
            <h2>{{ $analysis['career'] }}</h2>
            <p>{{ $analysis['name'] }} &bull; {{ $analysis['institution'] }} &bull; {{ $analysis['field'] }}</p>
        </div>
    </div>

    {{-- Score --}}
    <div class="score-row">
        <div class="sc">
            <span class="sc-n">{{ $analysis['score'] }}%</span>
            <span class="sc-l">match</span>
        </div>
        <div class="sc-info">
            <h3>
                @if($analysis['score'] >= 75) Strong match — you are well-suited!
                @elseif($analysis['score'] >= 50) Good potential — a few gaps to close.
                @else Keep building — more preparation needed.
                @endif
            </h3>
            <p>You meet {{ count($analysis['met']) }} out of {{ count($analysis['met']) + count($analysis['missing']) }} key requirements.</p>
        </div>
    </div>

    {{-- Requirements grid --}}
    <div class="rq-grid">
        <div class="panel">
            <div class="panel-head">
                <div class="dot dot-g"></div>
                What you already have
                <span class="panel-count" style="color:var(--success)">{{ count($analysis['met']) }} matched</span>
            </div>
            <div class="panel-body">
                @forelse($analysis['met'] as $req)
                <div class="req-item">
                    <span class="req-name">{{ $req }}</span>
                    <div class="chk chk-ok">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                </div>
                @empty
                <p style="font-size:13px;color:var(--txt3);padding:8px 0">No matched requirements yet.</p>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="panel-head">
                <div class="dot dot-r"></div>
                What you still need
                <span class="panel-count" style="color:var(--danger)">{{ count($analysis['missing']) }} {{ count($analysis['missing']) == 1 ? 'gap' : 'gaps' }}</span>
            </div>
            <div class="panel-body">
                @forelse($analysis['missing'] as $item)
                <div class="need-item">
                    <div class="need-num">{{ $loop->iteration }}</div>
                    <div>
                        <div class="need-name">{{ $item['skill'] }}</div>
                        <div class="need-tip">{{ $item['tip'] }}</div>
                    </div>
                </div>
                @empty
                <p style="font-size:13px;color:var(--success);padding:8px 0">All requirements met!</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- AI advice --}}
    <div class="ai-box">
        <div class="ai-head">
            <span class="ai-badge">AI Insight</span>
            <h3>Personalised career advice</h3>
        </div>
        <div class="ai-body">{{ $analysis['ai_advice'] }}</div>
    </div>

    {{-- Actions --}}
    <div class="act-row">
        <a href="{{ route('guidance.index') }}" class="btn btn-ghost">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Check another career
        </a>
        <button class="btn btn-yellow" onclick="window.print()">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
            Save report
        </button>
        <a href="{{ route('home') }}" class="btn btn-outline">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            AI mentoring
        </a>
    </div>

</div>

@endsection
