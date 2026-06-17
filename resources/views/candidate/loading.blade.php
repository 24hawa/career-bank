@extends('layouts.candidate')
@section('title', 'Analysing Profile...')

@section('content')
<div class="loading-screen" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 60vh; text-align: center; padding: 40px 20px;">
    
    {{-- ── ROTATING SPIN MATRIX ── --}}
    <div class="spin-wrap" style="position: relative; margin-bottom: 24px;">
        <div class="spin-ring"></div>
        <div class="spin-icon" style="color: var(--gold);">
            <i class="ti ti-dna-2" style="font-size: 28px; animation: pulse 1.5s infinite alternate;"></i>
        </div>
    </div>

    <h2 style="font-size: 20px; font-weight: 600; color: var(--text); margin-bottom: 6px;">Analysing your career match...</h2>
    <p style="font-size: 14px; color: var(--muted); margin-bottom: 32px; max-width: 400px;">
        AI is reviewing your documents, extracting academic markers, and indexing your experience profile.
    </p>

    {{-- ── PARSING SEQUENTIAL PROGRESS STEPS ── --}}
    <div class="steps" style="display: flex; flex-direction: column; gap: 14px; text-align: left; width: 100%; max-width: 340px; margin: 0 auto;">
        <div class="step" id="s1" style="display: flex; align-items: center; gap: 12px; opacity: 0.3; transition: all 0.4s ease;">
            <div class="sdot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--muted);"></div>
            <span style="font-size: 13px; color: var(--text);">Reading your resume and documents</span>
        </div>
        <div class="step" id="s2" style="display: flex; align-items: center; gap: 12px; opacity: 0.3; transition: all 0.4s ease;">
            <div class="sdot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--muted);"></div>
            <span style="font-size: 13px; color: var(--text);">Identifying your skills and experience</span>
        </div>
        <div class="step" id="s3" style="display: flex; align-items: center; gap: 12px; opacity: 0.3; transition: all 0.4s ease;">
            <div class="sdot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--muted);"></div>
            <span style="font-size: 13px; color: var(--text);">Matching against career requirements</span>
        </div>
        <div class="step" id="s4" style="display: flex; align-items: center; gap: 12px; opacity: 0.3; transition: all 0.4s ease;">
            <div class="sdot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--muted);"></div>
            <span style="font-size: 13px; color: var(--text);">Generating your career match report</span>
        </div>
    </div>

    {{-- Abort Request Switch --}}
    <a href="{{ route('candidate.guidance') }}" class="btn btn-ghost btn-sm" style="margin-top: 36px; gap: 6px;">
        <i class="ti ti-x" style="font-size: 14px;"></i> Cancel Analysis
    </a>
</div>

{{-- ── REDIRECT AUTO-SUBMIT FORM TRAY ── --}}
<form id="proceed-form" action="/candidate/result" method="GET" style="display:none">
</form>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const steps  = ['s1', 's2', 's3', 's4'];
    const delays = [300, 1200, 2200, 3200];

    // Progress State Loop
    delays.forEach((delay, index) => {
        setTimeout(() => {
            const currentStep = document.getElementById(steps[index]);
            if (currentStep) {
                currentStep.style.opacity = "1";
                const dot = currentStep.querySelector('.sdot');
                if (dot) dot.style.background = "#C89B00"; // Accent active step
            }
            
            // Mark previous as completed
            if (index > 0) {
                const prevStep = document.getElementById(steps[index - 1]);
                if (prevStep) {
                    prevStep.style.opacity = "0.6";
                    const prevDot = prevStep.querySelector('.sdot');
                    if (prevDot) prevDot.style.background = "#3B6D11"; // Green completed indicator
                }
            }
        }, delay);
    });

    // Form Pipeline Dispatch Execution
    setTimeout(() => {
        const finalStep = document.getElementById('s4');
        if (finalStep) {
            finalStep.style.opacity = "0.6";
            const finalDot = finalStep.querySelector('.sdot');
            if (finalDot) finalDot.style.background = "#3B6D11";
        }
        
        setTimeout(() => {
            document.getElementById('proceed-form').submit();
        }, 600);
    }, 4200);
});
</script>
@endpush