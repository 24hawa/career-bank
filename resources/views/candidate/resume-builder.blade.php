@extends('layouts.candidate')
@section('title', 'AI Resume Builder')

@section('content')
<div class="page">
    
    {{-- PAGE HEADER --}}
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 600; color: var(--text); margin-bottom: 4px;">Smart Resume Builder</h1>
        <p style="font-size: 14px; color: var(--muted);">Fill in your credentials to auto-generate a professional transcript-ready CV.</p>
    </div>

    {{-- SPLIT WORKSPACE INTERFACE --}}
    <div style="display: flex; gap: 24px; align-items: flex-start; flex-wrap: wrap;">
        
        {{-- LEFT PANEL: CONTROL FORMS (45% Width) --}}
        <div style="flex: 1; min-width: 360px; max-width: 500px; display: flex; flex-direction: column; gap: 20px;">
            
            {{-- Personal Details Card --}}
            <div class="card" style="padding: 20px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-user" style="color: #0083A0;"></i> Personal Details
                </h3>
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-input" id="in-name" value="Shafiena Binti Usri" oninput="updateResume()" style="width: 100%;">
                </div>
                <div class="form-group">
                    <label class="form-label">Professional Title</label>
                    <input type="text" class="form-input" id="in-title" value="Software Engineering Student" oninput="updateResume()" style="width: 100%;">
                </div>
                <div class="form-grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" id="in-email" value="shafiena@university.edu.my" oninput="updateResume()">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-input" id="in-phone" value="+60 12-345 6789" oninput="updateResume()">
                    </div>
                </div>
            </div>

            {{-- Education & University Card --}}
            <div class="card" style="padding: 20px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-school" style="color: #0083A0;"></i> Academic Background
                </h3>
                <div class="form-group">
                    <label class="form-label">University / Institution</label>
                    <input type="text" class="form-input" id="in-uni" value="Universiti Pendidikan Sultan Idris (UPSI)" oninput="updateResume()" style="width: 100%;">
                </div>
                <div class="form-group">
                    <label class="form-label">Course / Field of Study</label>
                    <input type="text" class="form-input" id="in-course" value="Bachelor of Software Engineering (Honours)" oninput="updateResume()" style="width: 100%;">
                </div>
                <div class="form-grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div class="form-group">
                        <label class="form-label">Graduation Year</label>
                        <input type="text" class="form-input" id="in-grad" value="2027" oninput="updateResume()">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Current CGPA</label>
                        <input type="text" class="form-input" id="in-cgpa" value="3.85" oninput="updateResume()">
                    </div>
                </div>
            </div>

            {{-- Skills & Highlights Card --}}
            <div class="card" style="padding: 20px;">
                <h3 style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                    <i class="ti ti-bookmarks" style="color: #0083A0;"></i> Core Skills (Comma Separated)
                </h3>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Technical Competencies</label>
                    <textarea class="form-input" id="in-skills" rows="3" oninput="updateResume()" style="width: 100%; font-family: inherit; resize: none;">Laravel, PHP, MySQL, JavaScript, UI/UX Design, Git, Agile Methodology</textarea>
                </div>
            </div>

            {{-- Action Controls --}}
            <div style="display: flex; gap: 12px;">
                <button class="btn btn-primary" onclick="alert('Resume saved to your profile profile vault successfully!')" style="flex: 1; padding: 12px;">
                    <i class="ti ti-device-floppy"></i> Save to Profile
                </button>
                <button class="btn btn-outline" onclick="window.print()" style="padding: 12px;">
                    <i class="ti ti-printer"></i> Print / PDF
                </button>
            </div>

        </div>

        {{-- RIGHT PANEL: LIVE SHEET PREVIEW (55% Width) --}}
        <div style="flex: 1.2; min-width: 400px; display: flex; justify-content: center;">
            <div id="resume-sheet" style="width: 100%; max-width: 595px; min-height: 842px; background: #fff; border: 1px solid var(--border); box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 8px; padding: 40px; color: #1e293b; font-family: 'Inter', sans-serif;">
                
                {{-- Sheet Header Summary --}}
                <div style="border-bottom: 2px solid #0B1A0E; padding-bottom: 16px; margin-bottom: 20px;">
                    <h2 id="view-name" style="font-size: 24px; font-weight: 700; color: #0B1A0E; margin: 0 0 4px 0; letter-spacing: -0.5px;">Shafiena Binti Usri</h2>
                    <div id="view-title" style="font-size: 14px; font-weight: 500; color: #0083A0; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Software Engineering Student</div>
                    
                    <div style="display: flex; gap: 16px; flex-wrap: wrap; font-size: 12px; color: #64748b;">
                        <span style="display: flex; align-items: center; gap: 4px;"><i class="ti ti-mail"></i> <span id="view-email">shafiena@university.edu.my</span></span>
                        <span style="display: flex; align-items: center; gap: 4px;"><i class="ti ti-phone"></i> <span id="view-phone">+60 12-345 6789</span></span>
                    </div>
                </div>

                {{-- Education block on Sheet --}}
                <div style="margin-bottom: 24px;">
                    <h4 style="font-size: 13px; font-weight: 700; color: #0B1A0E; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 10px; border-bottom: 1px solid #e2e8f0; padding-bottom: 4px;">Education</h4>
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 4px;">
                        <span id="view-uni" style="font-size: 13px; font-weight: 600; color: #1e293b;">Universiti Pendidikan Sultan Idris (UPSI)</span>
                        <span id="view-grad" style="font-size: 12px; color: #64748b; font-weight: 500;">Graduation: 2027</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <span id="view-course" style="font-size: 12px; color: #475569; font-style: italic;">Bachelor of Software Engineering (Honours)</span>
                        <span style="font-size: 12px; color: #1e293b; font-weight: 600;">CGPA: <span id="view-cgpa">3.85</span></span>
                    </div>
                </div>

                {{-- Sample Work Experience block on Sheet --}}
                <div style="margin-bottom: 24px;">
                    <h4 style="font-size: 13px; font-weight: 700; color: #0B1A0E; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 10px; border-bottom: 1px solid #e2e8f0; padding-bottom: 4px;">Projects & Experience</h4>
                    
                    <div style="margin-bottom: 12px;">
                        <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 600; color: #1e293b; margin-bottom: 2px;">
                            <span>Academic Project Framework Architect</span>
                            <span style="font-size: 12px; color: #64748b; font-weight: 500;">2025 - Present</span>
                        </div>
                        <p style="font-size: 12px; color: #475569; margin: 0; line-height: 1.5;">Developed and fine-tuned clean MVC architecture components utilizing state frameworks, mapping system databases, and building responsive dynamic view controls.</p>
                    </div>
                </div>

                {{-- Dynamic Skills block on Sheet --}}
                <div>
                    <h4 style="font-size: 13px; font-weight: 700; color: #0B1A0E; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 10px; border-bottom: 1px solid #e2e8f0; padding-bottom: 4px;">Skills & Competencies</h4>
                    <div id="view-skills-box" style="display: flex; flex-wrap: wrap; gap: 6px; padding-top: 2px;">
                        <!-- Automatically populated via JavaScript rendering engine -->
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
function updateResume() {
    // Map Inputs to View Targets
    document.getElementById('view-name').textContent = document.getElementById('in-name').value || 'Your Name';
    document.getElementById('view-title').textContent = document.getElementById('in-title').value || 'Professional Title';
    document.getElementById('view-email').textContent = document.getElementById('in-email').value || 'email@domain.com';
    document.getElementById('view-phone').textContent = document.getElementById('in-phone').value || '+60 00-000 0000';
    document.getElementById('view-uni').textContent = document.getElementById('in-uni').value || 'University Name';
    document.getElementById('view-course').textContent = document.getElementById('in-course').value || 'Course Title';
    document.getElementById('view-grad').textContent = 'Graduation: ' + (document.getElementById('in-grad').value || 'N/A');
    document.getElementById('view-cgpa').textContent = document.getElementById('in-cgpa').value || '0.00';

    // Handle Skill tags rendering array separation dynamically
    const skillsBox = document.getElementById('view-skills-box');
    skillsBox.innerHTML = '';
    const rawSkills = document.getElementById('in-skills').value.split(',');
    
    rawSkills.forEach(skill => {
        const trimmed = skill.trim();
        if(trimmed.length > 0) {
            const span = document.createElement('span');
            span.style.cssText = 'background: #f1f5f9; color: #334155; font-size: 11px; padding: 4px 10px; border-radius: 4px; font-weight: 500; border: 1px solid #e2e8f0;';
            span.textContent = trimmed;
            skillsBox.appendChild(span);
        }
    });
}

// Fire on first setup boot run
document.addEventListener('DOMContentLoaded', function() {
    updateResume();
});
</script>
@endpush