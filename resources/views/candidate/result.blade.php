@extends('layouts.candidate')
@section('title', 'Career Match Report')

@section('content')
<div class="page">
    
    <div style="margin-bottom: 24px;">
        <span class="badge badge-gold" style="margin-bottom: 6px;">Analysis Complete</span>
        <h1 style="font-size: 24px; font-weight: 600; color: var(--text); margin-bottom: 4px;">Your Career Match Report</h1>
        <p style="font-size: 14px; color: var(--muted);">Here's your compatibility score and personalised guidance.</p>
    </div>

    <div class="result-card">

        {{-- ── REPORT HEADER ELEMENT ── --}}
        <div class="res-head" style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 24px;">
            <div class="res-icon" style="width: 44px; height: 44px; border-radius: 8px; background: rgba(200,155,0,0.1); color: #0083A0; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <i class="ti ti-target-arrow" style="font-size: 22px;"></i>
            </div>
            <div class="res-title">
                <h2 style="font-size: 20px; font-weight: 600; color: var(--text); margin: 0 0 4px 0;">{{ $analysis['career'] }}</h2>
                <p style="font-size: 13px; color: var(--muted); margin: 0;">
                    {{ $analysis['name'] }} &bull; {{ $analysis['institution'] }} &bull; {{ $analysis['field'] }}
                </p>
            </div>
        </div>

        {{-- ── ACCENT SCORE METRICS ROW ── --}}
        <div class="score-row" style="display: flex; align-items: center; gap: 20px; padding: 20px; background: var(--input-bg); border: 1px solid var(--border); border-radius: 12px; margin-bottom: 24px;">
            <div class="sc" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 72px; height: 72px; border-radius: 50%; border: 4px solid #0083A0; background: rgba(200,155,0,0.05); flex-shrink: 0;">
                <span class="sc-n" style="font-size: 18px; font-weight: 700; color: #0083A0;">{{ $analysis['score'] }}%</span>
                <span class="sc-l" style="font-size: 10px; color: var(--muted); text-transform: uppercase; margin-top: -2px;">match</span>
            </div>
            <div class="sc-info">
                <h3 style="font-size: 15px; font-weight: 500; color: var(--text); margin: 0 0 4px 0;">
                    @if($analysis['score'] >= 75) Strong match — you are well-suited!
                    @elseif($analysis['score'] >= 50) Good potential — a few gaps to close.
                    @else Keep building — more preparation needed.
                    @endif
                </h3>
                <p style="font-size: 13px; color: var(--muted); margin: 0;">
                    You meet {{ count($analysis['met']) }} out of {{ count($analysis['met']) + count($analysis['missing']) }} key matrix requirements.
                </p>
            </div>
        </div>

        {{-- ── REQUIREMENTS AND GAPS SPLIT PANEL ── --}}
        <div class="grid-2" style="gap: 20px; margin-bottom: 24px;">
            
            {{-- VERIFIED SKILLS MATCHED PANEL --}}
            <div class="panel" style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; padding: 16px;">
                <div class="panel-head" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 10px; margin-bottom: 12px; font-size: 13px; font-weight: 500; color: var(--text);">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div class="dot dot-g" style="width: 8px; height: 8px; border-radius: 50%; background: #3B6D11;"></div>
                        What you already have
                    </div>
                    <span class="panel-count" style="color: #3B6D11; font-weight: 600;">{{ count($analysis['met']) }} verified</span>
                </div>
                <div class="panel-body">
                    @forelse($analysis['met'] as $req)
                    <div class="req-item" style="display: flex; align-items: center; justify-content: space-between; padding: 8px 10px; background: rgba(59,109,17,0.05); border: 1px solid rgba(59,109,17,0.15); border-radius: 8px; margin-bottom: 8px; font-size: 13px; color: var(--text);">
                        <span class="req-name">{{ $req }}</span>
                        <div class="chk chk-ok" style="color: #3B6D11; display: flex; align-items: center;">
                            <i class="ti ti-circle-check-filled" style="font-size: 16px;"></i>
                        </div>
                    </div>
                    @empty
                    <p style="font-size: 13px; color: var(--muted); padding: 8px 0; text-align: center;">No verified markers found.</p>
                    @endforelse
                </div>
            </div>

            {{-- TARGET DEVELOPMENT GAPS PANEL --}}
            <div class="panel" style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; padding: 16px;">
                <div class="panel-head" style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 10px; margin-bottom: 12px; font-size: 13px; font-weight: 500; color: var(--text);">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div class="dot dot-r" style="width: 8px; height: 8px; border-radius: 50%; background: #E24B4A;"></div>
                        What you still need
                    </div>
                    <span class="panel-count" style="color: #E24B4A; font-weight: 600;">{{ count($analysis['missing']) }} {{ count($analysis['missing']) == 1 ? 'gap' : 'gaps' }}</span>
                </div>
                <div class="panel-body">
                    @forelse($analysis['missing'] as $item)
                    <div class="need-item" style="display: flex; gap: 12px; padding: 10px; border-radius: 8px; border: 1px solid var(--border); margin-bottom: 8px; background: var(--input-bg);">
                        <div class="need-num" style="display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 50%; background: rgba(226,75,74,0.1); color: #E24B4A; font-size: 11px; font-weight: 600; flex-shrink: 0;">
                            {{ $loop->iteration }}
                        </div>
                        <div>
                            <div class="need-name" style="font-size: 13px; font-weight: 500; color: var(--text); margin-bottom: 2px;">{{ $item['skill'] }}</div>
                            <div class="need-tip" style="font-size: 11px; color: var(--muted); line-height: 1.4;">{{ $item['tip'] }}</div>
                        </div>
                    </div>
                    @empty
                    <p style="font-size: 13px; color: #3B6D11; padding: 8px 0; text-align: center; font-weight: 500;">
                        <i class="ti ti-confetti"></i> Outstanding! All checklist goals met.
                    </p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ── PERSISTENT AI BOX ADVICE ── --}}
        <div class="ai-box" style="margin-bottom: 28px;">
            <div class="ai-head" style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span class="ai-badge" style="background: #0083A0; color: #ffffff; font-size: 10px; font-weight: 600; text-transform: uppercase; padding: 2px 6px; border-radius: 4px;">AI Insight</span>
                <h3 style="font-size: 14px; font-weight: 600; color: var(--text); margin: 0;">Personalised Career Guidance</h3>
            </div>
            <div class="ai-body" style="font-size: 13px; color: var(--muted); line-height: 1.6;">
                {{ $analysis['ai_advice'] }}
            </div>
        </div>

        {{-- ── REPORT TRAY ACTION CONTAINER ── --}}
        <div class="act-row" style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border); padding-top: 20px; flex-wrap: wrap; gap: 12px;">
            <a href="{{ route('candidate.guidance') }}" class="btn btn-ghost">
                <i class="ti ti-arrow-left"></i> Check another career
            </a>
            
            <div style="display: flex; align-items: center; gap: 8px;">
                <button class="btn btn-outline" onclick="window.print()">
                    <i class="ti ti-printer"></i> Save report
                </button>
                <a href="{{ route('candidate.home') }}" class="btn btn-primary">
                    <i class="ti ti-smart-home"></i> Return home
                </a>
            </div>
        </div>

    </div>
</div>
@endsection