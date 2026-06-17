@extends('layouts.candidate')
@section('title', 'Home')

@section('content')
<div class="page">

    <div style="margin-bottom:24px">
        <div style="font-size:22px;font-weight:600;color:var(--text);margin-bottom:4px">
            Welcome back
        </div>
        <div style="font-size:13px;color:var(--muted)">What would you like to do today?</div>
    </div>

  {{-- ── FEATURE CARDS ── --}}
<div class="grid-2" style="margin-bottom:24px">

    {{-- IDENTIFY CAREER CARD (Now Wider!) --}}
    <div class="feature-card highlight" onclick="showModal('identify-modal')" style="grid-column: span 2;">
        <div class="feature-card-tag"><i class="ti ti-sparkles" style="font-size:10px"></i> AI-powered</div>
        <div class="feature-card-icon" style="background:rgba(0,163,196,0.15)">
            <i class="ti ti-dna" style="color:#0083A0"></i>
        </div>
        <div class="feature-card-title">Identify Career</div>
        <div class="feature-card-desc">
            Upload your academic transcript. AI will scan and detect the most suitable careers
            based on your academic background, skills, and experience.
        </div>
        <button class="btn btn-primary btn-sm" onclick="event.stopPropagation(); showModal('identify-modal')">
            <i class="ti ti-arrow-right"></i> Go
        </button>
    </div>
    
    {{-- RESUME BUILDER CARD --}}
        <div class="feature-card" onclick="window.location='/candidate/resume-builder'">
            <div class="feature-card-icon" style="background:rgba(26,51,32,0.5)">
                <i class="ti ti-file-text" style="color:var(--muted)"></i>
            </div>
            <div class="feature-card-title">Resume Builder</div>
            <div class="feature-card-desc">
                Create a professional, ATS-friendly resume tailored to your 
                Career DNA profile. Export to PDF in minutes.
            </div>
            <a href="/candidate/resume-builder" class="btn btn-outline btn-sm"
               onclick="event.stopPropagation()">
                <i class="ti ti-arrow-right"></i> Go
            </a>
        </div>
    
    {{-- CAREER MATCHES CARD --}}
        <div class="feature-card" onclick="window.location='/candidate/guidance'">
            <div class="feature-card-icon" style="background:rgba(26,51,32,0.5)">
                <i class="ti ti-list-search" style="color:var(--muted)"></i>
            </div>
            <div class="feature-card-title">Career Matches</div>
            <div class="feature-card-desc">
                View your AI-matched career results ranked by compatibility score.
                See what skills you have and what you still need.
            </div>
            <a href="/candidate/guidance" class="btn btn-outline btn-sm"
               onclick="event.stopPropagation()">
                <i class="ti ti-arrow-right"></i> Go
            </a>
        </div>

        {{-- FIND JOBS CARD --}}
        <div class="feature-card" onclick="window.location='{{ route('candidate.jobs') }}'">
            <div class="feature-card-icon" style="background:rgba(26,51,32,0.5)">
                <i class="ti ti-search" style="color:var(--muted)"></i>
            </div>
            <div class="feature-card-title">Search Jobs</div>
            <div class="feature-card-desc">
                Search and browse job listings matched to your Career DNA profile.
                Filter by location, salary, and job type.
            </div>
            <a href="{{ route('candidate.jobs') }}" class="btn btn-outline btn-sm"
               onclick="event.stopPropagation()">
                <i class="ti ti-arrow-right"></i> Go
            </a>
        </div>

        {{-- MY APPLICATIONS CARD --}}
        <div class="feature-card" onclick="window.location='/candidate/applications'">
            <div class="feature-card-icon" style="background:rgba(26,51,32,0.5)">
                <i class="ti ti-file-description" style="color:var(--muted)"></i>
            </div>
            <div class="feature-card-title">My Applications</div>
            <div class="feature-card-desc">
                Track all your job applications. See which employers have viewed
                your profile and monitor your application status.
            </div>
            <a href="/candidate/applications" class="btn btn-outline btn-sm"
               onclick="event.stopPropagation()">
                <i class="ti ti-arrow-right"></i> Go
            </a>
        </div>

    </div>

    {{-- ── CAREER DNA STATUS BAR ── --}}
    <div class="card" style="display:flex;align-items:center;gap:20px">
        <svg width="60" height="60" viewBox="0 0 60 60" style="flex-shrink:0">
            <circle cx="30" cy="30" r="24" fill="none" stroke="var(--border)" stroke-width="5"/>
            <circle cx="30" cy="30" r="24" fill="none" stroke="#0083A0" stroke-width="5"
                stroke-dasharray="124 151" stroke-dashoffset="38" stroke-linecap="round"/>
            <text x="30" y="35" text-anchor="middle" font-size="12" font-weight="600" fill="#0083A0">82%</text>
        </svg>
        <div style="flex:1">
            <div style="font-size:14px;font-weight:500;color:var(--text);margin-bottom:2px">
                Your Career DNA — Software Developer
            </div>
            <div style="font-size:12px;color:var(--muted)">
                Last updated 3 days ago &nbsp;·&nbsp; 4 skills verified &nbsp;·&nbsp; 3 skills to learn
            </div>
        </div>
        <button class="btn btn-primary btn-sm" onclick="showModal('identify-modal')">
            <i class="ti ti-refresh"></i> Re-scan
        </button>
        <a href="/candidate/result" class="btn btn-outline btn-sm">
            <i class="ti ti-list-search"></i> View matches
        </a>
    </div>

</div>

{{-- ════════════════════════════════════════
     IDENTIFY CAREER MODAL
════════════════════════════════════════ --}}
<div id="identify-modal" class="modal-overlay" style="display:none">
    <div class="modal">

        {{-- Modal header --}}
        <div class="modal-header">
            <div>
                <div class="modal-title">
                    <i class="ti ti-dna" style="color:#0083A0;margin-right:6px"></i> Identify Career
                </div>
                <div class="modal-subtitle">
                    Fill in your details and upload your transcript — AI will do the rest
                </div>
            </div>
            <button class="modal-close" onclick="closeModal('identify-modal')">
                <i class="ti ti-x"></i>
            </button>
        </div>

        {{-- Modal body --}}
        <div class="modal-body">

            {{-- Step indicator --}}
            <div class="steps">
                <div class="step-wrap">
                    <div class="step-dot active" id="step-dot-1">1</div>
                    <div class="step-label active" id="step-lbl-1">Details</div>
                </div>
                <div class="step-line" id="step-line-1"></div>
                <div class="step-wrap">
                    <div class="step-dot" id="step-dot-2">2</div>
                    <div class="step-label" id="step-lbl-2">Upload</div>
                </div>
                <div class="step-line" id="step-line-2"></div>
                <div class="step-wrap">
                    <div class="step-dot" id="step-dot-3">3</div>
                    <div class="step-label" id="step-lbl-3">Scanning</div>
                </div>
                <div class="step-line" id="step-line-3"></div>
                <div class="step-wrap">
                    <div class="step-dot" id="step-dot-4">4</div>
                    <div class="step-label" id="step-lbl-4">Results</div>
                </div>
            </div>

            {{-- STEP 1 — Personal details --}}
            <div id="modal-step-1">
                <div style="font-size:13px;font-weight:500;color:var(--text);margin-bottom:14px;display:flex;align-items:center;gap:7px">
                    <i class="ti ti-user" style="color:#0083A0"></i> Personal details
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Full name *</label>
                        <input type="text" id="ic-name" class="form-input"
                               placeholder="e.g. Shafiena Binti Usri"
                               value="{{ auth()->user()->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student ID</label>
                        <input type="text" id="ic-student-id" class="form-input" placeholder="e.g. D20231106426">
                    </div>
                    <div class="form-group">
                        <label class="form-label">University *</label>
                        <input type="text" id="ic-university" class="form-input" placeholder="e.g. UPSI">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Faculty</label>
                        <input type="text" id="ic-faculty" class="form-input" placeholder="e.g. FKMT">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Field of study *</label>
                        <input type="text" id="ic-field" class="form-input" placeholder="e.g. Software Engineering">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Current year</label>
                        <select id="ic-year" class="form-select">
                            <option>Year 1</option>
                            <option>Year 2</option>
                            <option selected>Year 3</option>
                            <option>Year 4</option>
                            <option>Graduate</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- STEP 2 — Upload --}}
            <div id="modal-step-2" style="display:none">
                <div style="font-size:13px;font-weight:500;color:var(--text);margin-bottom:6px;display:flex;align-items:center;gap:7px">
                    <i class="ti ti-file-upload" style="color:#0083A0"></i> Academic transcript
                </div>
                <div style="font-size:12px;color:var(--muted);margin-bottom:14px">
                    Upload your result slip or academic transcript. AI will scan it to detect your skills and match suitable careers.
                </div>

                <div class="upload-zone" id="academic-zone">
                    <input type="file" name="academic_doc" accept=".pdf,.jpg,.jpeg,.png"
                           onchange="fileSelected(this,'academic-zone','academic-filename','academic-filesize')">
                    <i class="upload-icon ti ti-file-description"></i>
                    <div class="upload-title" id="academic-filename">Drop your transcript here or click to browse</div>
                    <div class="upload-sub" id="academic-filesize">Result slip, transcript, or programme structure</div>
                    <div style="display:flex;gap:6px;justify-content:center;margin-top:10px">
                        <span class="chip">PDF</span><span class="chip">JPG</span>
                        <span class="chip">PNG</span><span class="chip">Max 10MB</span>
                    </div>
                </div>

                <div style="font-size:12px;font-weight:500;color:var(--muted);margin-bottom:8px">
                    Extra documents <span style="font-weight:400">(optional — improves accuracy)</span>
                </div>
                <div class="upload-zone" id="extra-zone" style="padding:18px">
                    <input type="file" name="extra_doc" accept=".pdf,.jpg,.jpeg,.png"
                           onchange="fileSelected(this,'extra-zone','extra-filename','extra-filesize')">
                    <i class="upload-icon ti ti-certificate" style="font-size:24px"></i>
                    <div class="upload-title" id="extra-filename" style="font-size:12px">Co-curriculum, certificates or awards</div>
                    <div class="upload-sub" id="extra-filesize">Optional but improves match accuracy</div>
                </div>

                <div class="ai-box" style="margin-top:4px">
                    <i class="ti ti-shield-check ai-box-icon"></i>
                    <div>
                        <div class="ai-box-title">Your documents are secure</div>
                        <div class="ai-box-text">
                            AI uses OCR to scan your files and extract skills, GPA, and academic data only.
                            Your documents are never shared with employers or third parties.
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 3 — Scanning --}}
            <div id="modal-step-3" style="display:none;text-align:center;padding:20px 0">
                <div class="spinner" style="margin:0 auto 20px"></div>
                <div style="font-size:16px;font-weight:500;color:var(--text);margin-bottom:6px">AI is reading your transcript</div>
                <div style="font-size:13px;color:var(--muted);margin-bottom:24px;line-height:1.7">
                    Please wait while we analyse your academic background<br>and detect suitable careers for you
                </div>
                <div style="display:flex;flex-direction:column;gap:8px;text-align:left">
                    <div class="ai-box" style="border-left-color:#3B6D11" id="scan-1">
                        <i class="ti ti-check ai-box-icon" style="color:#3B6D11"></i>
                        <div class="ai-box-text">Document received and uploaded successfully</div>
                    </div>
                    <div class="ai-box" id="scan-2">
                        <i class="ti ti-loader ai-box-icon" style="animation:spin 1s linear infinite"></i>
                        <div class="ai-box-text">Reading and extracting academic content...</div>
                    </div>
                    <div class="ai-box" style="opacity:0.4" id="scan-3">
                        <i class="ti ti-brain ai-box-icon"></i>
                        <div class="ai-box-text">Analysing subjects and skills from transcript</div>
                    </div>
                    <div class="ai-box" style="opacity:0.4" id="scan-4">
                        <i class="ti ti-percentage ai-box-icon"></i>
                        <div class="ai-box-text">Calculating career match scores</div>
                    </div>
                    <div class="ai-box" style="opacity:0.4" id="scan-5">
                        <i class="ti ti-dna ai-box-icon"></i>
                        <div class="ai-box-text">Building your Career DNA profile</div>
                    </div>
                </div>
            </div>

            {{-- STEP 4 — Results --}}
            <div id="modal-step-4" style="display:none">

                {{-- Scanned from --}}
                <div style="display:flex;align-items:center;justify-content:space-between;background:var(--card);border:1px solid var(--border);border-radius:10px;padding:12px 16px;margin-bottom:16px">
                    <div style="display:flex;align-items:center;gap:10px">
                        <i class="ti ti-file-check" style="font-size:20px;color:#3B6D11"></i>
                        <div>
                            <div style="font-size:13px;font-weight:500;color:var(--text)">transcript_sem6.pdf</div>
                            <div style="font-size:11px;color:var(--muted)">Scanned · UPSI · Software Engineering · Year 3</div>
                        </div>
                    </div>
                    <button class="btn btn-outline btn-sm" onclick="goStep(2)">
                        <i class="ti ti-refresh"></i> Re-upload
                    </button>
                </div>

                {{-- Career match cards --}}
                @php
                $careers = [
                    ['rank'=>1,'name'=>'Software Developer','sub'=>'Backend / Full-Stack','match'=>90,'chips'=>['Python','Flutter','Laravel','Git'],'badge'=>'badge-success','pill'=>'Top match','top'=>true],
                    ['rank'=>2,'name'=>'Data Analyst','sub'=>'Analytics / BI','match'=>80,'chips'=>['Python','ML','XGBoost'],'badge'=>'badge-success','pill'=>'Strong match','top'=>false],
                    ['rank'=>3,'name'=>'UI/UX Designer','sub'=>'Product Design','match'=>70,'chips'=>['Figma','Flutter UI'],'badge'=>'badge-warning','pill'=>'Good match','top'=>false],
                ];
                @endphp

                @foreach($careers as $career)
                <div class="card card-sm" style="margin-bottom:10px;border:1px solid {{ $career['top'] ? '#0083A0' : 'var(--border)' }}">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px">
                        <span style="font-size:10px;color:var(--muted)">Match #{{ $career['rank'] }}</span>
                        <span class="badge {{ $career['badge'] }}">{{ $career['pill'] }}</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px">
                        <svg width="52" height="52" viewBox="0 0 52 52" style="flex-shrink:0">
                            <circle cx="26" cy="26" r="21" fill="none" stroke="var(--border)" stroke-width="4"/>
                            <circle cx="26" cy="26" r="21" fill="none" stroke="#0083A0" stroke-width="4"
                                stroke-dasharray="{{ $career['match'] * 1.32 }} 132"
                                stroke-dashoffset="33" stroke-linecap="round"/>
                            <text x="26" y="30" text-anchor="middle" font-size="10" font-weight="600" fill="#0083A0">{{ $career['match'] }}%</text>
                        </svg>
                        <div>
                            <div style="font-size:14px;font-weight:500;color:var(--text)">{{ $career['name'] }}</div>
                            <div style="font-size:11px;color:var(--muted);margin-top:2px">{{ $career['sub'] }}</div>
                            <div style="margin-top:6px">
                                @foreach($career['chips'] as $chip)
                                    <span class="chip">{{ $chip }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:flex-end;gap:8px;padding-top:10px;border-top:1px solid var(--border)">
                        <button class="btn btn-outline btn-sm"
                                onclick="showSkillsPopup('{{ $career['name'] }}', {{ $career['match'] }})">
                            <i class="ti ti-chart-bar"></i> View skills
                        </button>
                        <a href="{{ route('candidate.jobs') }}?career={{ Str::slug($career['name']) }}"
                           class="btn btn-primary btn-sm" onclick="closeModal('identify-modal')">
                            <i class="ti ti-briefcase"></i> Find jobs
                        </a>
                    </div>
                </div>
                @endforeach

                <div class="ai-box" style="margin-top:4px">
                    <i class="ti ti-robot ai-box-icon"></i>
                    <div>
                        <div class="ai-box-title">AI Recommendation</div>
                        <div class="ai-box-text">
                            Software Developer is your strongest match. Click <strong style="color:#0083A0">View skills</strong>
                            to see what you have and what you still need. Click <strong style="color:#0083A0">Find jobs</strong>
                            to browse matching job listings.
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- /modal-body --}}

        {{-- Modal footer --}}
        <div class="modal-footer" id="modal-footer">
            <button class="btn btn-outline" onclick="closeModal('identify-modal')" id="btn-cancel">
                <i class="ti ti-x"></i> Cancel
            </button>
            <button class="btn btn-secondary" onclick="prevStep()" id="btn-back" style="display:none">
                <i class="ti ti-arrow-left"></i> Back
            </button>
            <button class="btn btn-primary" onclick="nextStep()" id="btn-next">
                Next <i class="ti ti-arrow-right"></i>
            </button>
        </div>

    </div>{{-- /modal --}}
</div>{{-- /modal-overlay --}}

{{-- ════════════════════════════════════════
     SKILLS POPUP (nested on top)
════════════════════════════════════════ --}}
<div id="skills-popup" class="popup-overlay" style="display:none">
    <div class="popup">
        <div class="popup-header">
            <div>
                <div class="popup-title" id="popup-career-name">
                    <i class="ti ti-chart-bar" style="color:#0083A0;margin-right:6px"></i> Career — Skill Requirements
                </div>
                <div class="popup-sub" id="popup-career-match">Based on your transcript</div>
            </div>
            <button class="modal-close" onclick="closePopup('skills-popup')">
                <i class="ti ti-x"></i>
            </button>
        </div>
        <div class="popup-body">

            {{-- Readiness score --}}
            <div style="display:flex;align-items:center;gap:20px;background:var(--card);border:1px solid var(--border);border-radius:12px;padding:16px;margin-bottom:16px">
                <svg id="popup-ring" width="70" height="70" viewBox="0 0 70 70" style="flex-shrink:0">
                    <circle cx="35" cy="35" r="28" fill="none" stroke="var(--border)" stroke-width="5"/>
                    <circle cx="35" cy="35" r="28" fill="none" stroke="#0083A0" stroke-width="5"
                        stroke-dasharray="148 176" stroke-dashoffset="44" stroke-linecap="round"/>
                    <text x="35" y="40" text-anchor="middle" font-size="13" font-weight="600" fill="#0083A0" id="popup-ring-text">84%</text>
                </svg>
                <div>
                    <div style="font-size:28px;font-weight:600;color:#0083A0" id="popup-score">84%</div>
                    <div style="font-size:13px;color:var(--text)">Career readiness</div>
                    <div style="font-size:11px;color:var(--muted);margin-top:3px" id="popup-skill-count">You have X of Y required skills</div>
                </div>
            </div>

            {{-- Skills you have --}}
            <div class="req-box req-box-have">
                <div class="req-box-title green">
                    <i class="ti ti-circle-check"></i> Skills you already have
                </div>
                <div id="popup-have-skills">
                    {{-- Populated by JS --}}
                </div>
            </div>

            {{-- Skills you need --}}
            <div class="req-box req-box-need">
                <div class="req-box-title red">
                    <i class="ti ti-alert-triangle"></i> Skills still needed
                </div>
                <div id="popup-need-skills">
                    {{-- Populated by JS --}}
                </div>
            </div>

            {{-- Skill bars --}}
            <div class="card" style="margin-bottom:14px">
                <div class="card-title"><i class="ti ti-chart-bar"></i> Skill breakdown</div>
                <div class="skill-bar">
                    <div class="skill-bar-header"><span>Programming</span><span id="bar-prog-val">90%</span></div>
                    <div class="skill-bar-track"><div class="skill-bar-fill" id="bar-prog" style="width:90%"></div></div>
                </div>
                <div class="skill-bar">
                    <div class="skill-bar-header"><span>Frameworks & Tools</span><span id="bar-fw-val">80%</span></div>
                    <div class="skill-bar-track"><div class="skill-bar-fill" id="bar-fw" style="width:80%"></div></div>
                </div>
                <div class="skill-bar">
                    <div class="skill-bar-header"><span>Industry Tools</span><span id="bar-ind-val" style="color:#E24B4A">30%</span></div>
                    <div class="skill-bar-track"><div class="skill-bar-fill danger" id="bar-ind" style="width:30%"></div></div>
                </div>
            </div>

            {{-- Switch career --}}
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px;flex-wrap:wrap">
                <span style="font-size:11px;color:var(--muted)">Check other career:</span>
                <button class="btn btn-outline btn-sm" onclick="showSkillsPopup('Software Developer',90)">Software Dev</button>
                <button class="btn btn-outline btn-sm" onclick="showSkillsPopup('Data Analyst',80)">Data Analyst</button>
                <button class="btn btn-outline btn-sm" onclick="showSkillsPopup('UI/UX Designer',70)">UI/UX Designer</button>
            </div>

            <div class="ai-box">
                <i class="ti ti-robot ai-box-icon"></i>
                <div>
                    <div class="ai-box-title">AI Tip</div>
                    <div class="ai-box-text" id="popup-ai-tip">
                        Start with Docker — free to learn via Docker Desktop, beginner-friendly, 1 week to basics.
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-footer">
            <button class="btn btn-outline" onclick="closePopup('skills-popup')">
                <i class="ti ti-arrow-left"></i> Back to results
            </button>
            <a href="{{ route('candidate.jobs') }}" class="btn btn-primary"
               onclick="closePopup('skills-popup'); closeModal('identify-modal')">
                <i class="ti ti-briefcase"></i> Find matching jobs
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// ── MODAL STEP LOGIC ──
let currentStep = 1;
const totalSteps = 4;

function goStep(step) {
    // Hide all steps
    for (let i = 1; i <= totalSteps; i++) {
        document.getElementById('modal-step-' + i).style.display = 'none';
        document.getElementById('step-dot-' + i).className = 'step-dot' + (i < step ? ' done' : i === step ? ' active' : '');
        document.getElementById('step-lbl-' + i).className = 'step-label' + (i < step ? ' done' : i === step ? ' active' : '');
        if (i < totalSteps) document.getElementById('step-line-' + i).className = 'step-line' + (i < step ? ' done' : '');
    }
    document.getElementById('modal-step-' + step).style.display = '';
    currentStep = step;

    // Footer buttons
    document.getElementById('btn-back').style.display   = step > 1 && step < 4 ? '' : 'none';
    document.getElementById('btn-next').style.display   = step < 4 ? '' : 'none';
    document.getElementById('btn-cancel').style.display = step === 4 ? 'none' : '';
    document.getElementById('btn-next').innerHTML       = step === 2 ? '<i class="ti ti-cpu"></i> Scan my transcript' : 'Next <i class="ti ti-arrow-right"></i>';

    // Start animation at step 3
    if (step === 3) startScanAnimation();
}

function nextStep() {
    if (currentStep < totalSteps) goStep(currentStep + 1);
}
function prevStep() {
    if (currentStep > 1) goStep(currentStep - 1);
}

function startScanAnimation() {
    const scanItems = [
        { id: 'scan-2', delay: 1200 },
        { id: 'scan-3', delay: 2400 },
        { id: 'scan-4', delay: 3600 },
        { id: 'scan-5', delay: 4800 },
    ];
    scanItems.forEach(({ id, delay }) => {
        setTimeout(() => {
            const el = document.getElementById(id);
            el.style.opacity = '1';
            el.querySelector('i').className = 'ti ti-loader ai-box-icon';
            el.querySelector('i').style.animation = 'spin 1s linear infinite';
            const prev = document.getElementById('scan-' + (parseInt(id.split('-')[1]) - 1));
            if (prev) {
                prev.style.borderLeftColor = '#3B6D11';
                prev.querySelector('i').className = 'ti ti-check ai-box-icon';
                prev.querySelector('i').style.color = '#3B6D11';
                prev.querySelector('i').style.animation = '';
            }
        }, delay);
    });
    setTimeout(() => {
        const last = document.getElementById('scan-5');
        last.style.borderLeftColor = '#3B6D11';
        last.querySelector('i').className = 'ti ti-check ai-box-icon';
        last.querySelector('i').style.color = '#3B6D11';
        last.querySelector('i').style.animation = '';
        goStep(4);
    }, 6000);
}

// ── SKILLS POPUP LOGIC ──
const skillData = {
    'Software Developer': {
        match: 90,
        have: [
            ['Python Programming',   'DEI3123, DES3113'],
            ['Flutter Development',  '3 Flutter projects'],
            ['Laravel Framework',    'DES3073 project'],
            ['Git Version Control',  'GitHub activity'],
        ],
        need: [
            ['Docker / Containerisation', 'Not found in transcript'],
            ['Cloud Platform (AWS)',      'Not found in transcript'],
            ['CI/CD Pipeline',            'Not found in transcript'],
        ],
        tip: 'Start with Docker — free via Docker Desktop, beginner-friendly, 1 week to basics.',
        bars: [90, 80, 30],
    },
    'Data Analyst': {
        match: 80,
        have: [
            ['Python Programming',   'DEI3123'],
            ['Machine Learning',     'XGBoost, sklearn'],
            ['Data Visualisation',   'EDA assignments'],
        ],
        need: [
            ['SQL Advanced',         'Not found in transcript'],
            ['Tableau / Power BI',   'Not found in transcript'],
        ],
        tip: 'SQL is your biggest gap. Try W3Schools SQL or a free MySQL course on Coursera.',
        bars: [85, 70, 40],
    },
    'UI/UX Designer': {
        match: 70,
        have: [
            ['Flutter UI',           'Lab assignments'],
            ['Wireframing',          'Basic prototypes'],
        ],
        need: [
            ['Figma (Advanced)',     'Not found in transcript'],
            ['User Research',        'Not found in transcript'],
            ['Prototyping Tools',    'Not found in transcript'],
        ],
        tip: 'Figma has a free plan. Start with their beginner tutorials — 2-3 days to basics.',
        bars: [60, 65, 35],
    },
};

function showSkillsPopup(careerName, match) {
    const data = skillData[careerName] || skillData['Software Developer'];
    document.getElementById('popup-career-name').innerHTML =
        '<i class="ti ti-chart-bar" style="color:#0083A0;margin-right:6px"></i>' + careerName + ' — Skill Requirements';
    document.getElementById('popup-career-match').textContent =
        'Based on your transcript · ' + data.match + '% overall match';
    document.getElementById('popup-score').textContent = data.match + '%';
    document.getElementById('popup-ring-text').textContent = data.match + '%';
    document.getElementById('popup-skill-count').textContent =
        'You have ' + data.have.length + ' of ' + (data.have.length + data.need.length) + ' required skills';
    document.getElementById('popup-ai-tip').textContent = data.tip;

    // Skill bars
    const barVals = data.bars;
    document.getElementById('bar-prog').style.width = barVals[0] + '%';
    document.getElementById('bar-prog-val').textContent = barVals[0] + '%';
    document.getElementById('bar-fw').style.width = barVals[1] + '%';
    document.getElementById('bar-fw-val').textContent = barVals[1] + '%';
    document.getElementById('bar-ind').style.width = barVals[2] + '%';
    document.getElementById('bar-ind-val').textContent = barVals[2] + '%';
    document.getElementById('bar-ind-val').style.color = barVals[2] < 50 ? '#E24B4A' : '#0083A0';

    // Have skills
    document.getElementById('popup-have-skills').innerHTML = data.have.map(([s, src]) => `
        <div class="req-item">
            <i class="ti ti-check req-item-icon" style="color:#3B6D11"></i>
            <div><div class="req-item-text">${s}</div><div class="req-item-sub"><i class="ti ti-file" style="font-size:11px"></i> ${src}</div></div>
        </div>`).join('');

    // Need skills
    document.getElementById('popup-need-skills').innerHTML = data.need.map(([s, note]) => `
        <div class="req-item">
            <i class="ti ti-x req-item-icon" style="color:#E24B4A"></i>
            <div><div class="req-item-text">${s}</div><div class="req-item-sub"><i class="ti ti-info-circle" style="font-size:11px"></i> ${note}</div></div>
        </div>`).join('');

    showPopup('skills-popup');
}

// Init step on open
document.getElementById('identify-modal').addEventListener('click', function(e) {
    if (e.target === this) closeModal('identify-modal');
});
document.addEventListener('DOMContentLoaded', () => goStep(1));
</script>
@endpush