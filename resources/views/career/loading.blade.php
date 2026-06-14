@extends('layouts.app')

@section('content')

<div class="loading-screen">
    <div class="spin-wrap">
        <div class="spin-ring"></div>
        <div class="spin-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
    </div>

    <h2>Analysing your career match...</h2>
    <p>AI is reviewing your documents and profile</p>

    <div class="steps">
        <div class="step" id="s1"><div class="sdot"></div><span>Reading your resume and documents</span></div>
        <div class="step" id="s2"><div class="sdot"></div><span>Identifying your skills and experience</span></div>
        <div class="step" id="s3"><div class="sdot"></div><span>Matching against career requirements</span></div>
        <div class="step" id="s4"><div class="sdot"></div><span>Generating your career match report</span></div>
    </div>

    <a href="{{ route('guidance.index') }}" class="btn btn-ghost" style="margin-top:28px">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        Cancel
    </a>
</div>

<form id="proceed-form" action="{{ route('guidance.result') }}" method="POST" style="display:none">
    @csrf
    <input type="hidden" name="analysis_key" value="{{ $analysis_key }}">
</form>

@endsection

@push('scripts')
<script>
const steps  = ['s1','s2','s3','s4'];
const delays = [300, 1100, 2000, 3000];

delays.forEach((d, i) => {
    setTimeout(() => {
        document.getElementById(steps[i]).classList.add('visible');
        if (i > 0) document.getElementById(steps[i - 1]).classList.add('done');
    }, d);
});

setTimeout(() => {
    document.getElementById('s4').classList.add('done');
    setTimeout(() => document.getElementById('proceed-form').submit(), 500);
}, 3900);
</script>
@endpush
