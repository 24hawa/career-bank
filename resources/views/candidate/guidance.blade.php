@extends('layouts.candidate')
@section('title', 'Career Matches Profile')

@section('content')
<div class="page">

    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 600; color: var(--text); margin-bottom: 4px;">Career Matches</h1>
        <p style="font-size: 14px; color: var(--muted);">Fill in your details and upload your documents so we can analyse your career fit.</p>
    </div>

    {{-- Error Alert Banner --}}
    @if($errors->any())
    <div class="badge badge-danger" style="display: flex; gap: 10px; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 13px; font-weight: 400; line-height: 1.5; width: 100%;">
        <i class="ti ti-alert-circle" style="font-size: 16px; margin-top: 2px;"></i>
        <div>
            @foreach($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="card">
        {{-- Fixed prototype action route parameter --}}
        <form action="/candidate/loading" method="GET" id="guidance-form">
            @csrf

            {{-- ── PROFILE MATRIX FIELDS ── --}}
            <div class="grid-2" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label class="form-label" for="full_name">Full name</label>
                    <input class="form-input" type="text" id="full_name" name="full_name" value="{{ old('full_name', auth()->user()->name ?? '') }}" placeholder="e.g. Shafiena" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="institution">Institution</label>
                    <input class="form-input" type="text" id="institution" name="institution" value="{{ old('institution') }}" placeholder="e.g. UPSI" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="field">Field / discipline</label>
                    <input class="form-input" type="text" id="field" name="field" value="{{ old('field') }}" placeholder="e.g. Computer Science" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="career">Select career to check</label>
                    <select class="form-select" id="career" name="career" required>
                        <option value="" disabled selected>Choose a career...</option>
                        <optgroup label="Technology">
                            <option value="Software Engineer" {{ old('career')=='Software Engineer' ? 'selected':'' }}>Software Engineer</option>
                            <option value="Data Analyst" {{ old('career')=='Data Analyst' ? 'selected':'' }}>Data Analyst</option>
                            <option value="UI/UX Designer" {{ old('career')=='UI/UX Designer' ? 'selected':'' }}>UI/UX Designer</option>
                            <option value="Cybersecurity Analyst"{{ old('career')=='Cybersecurity Analyst'? 'selected':'' }}>Cybersecurity Analyst</option>
                            <option value="AI/ML Engineer" {{ old('career')=='AI/ML Engineer' ? 'selected':'' }}>AI/ML Engineer</option>
                        </optgroup>
                        <optgroup label="Business">
                            <option value="Marketing Executive" {{ old('career')=='Marketing Executive' ? 'selected':'' }}>Marketing Executive</option>
                            <option value="Human Resource Executive" {{ old('career')=='Human Resource Executive' ? 'selected':'' }}>Human Resource Executive</option>
                            <option value="Business Analyst" {{ old('career')=='Business Analyst' ? 'selected':'' }}>Business Analyst</option>
                            <option value="Accountant" {{ old('career')=='Accountant' ? 'selected':'' }}>Accountant</option>
                            <option value="Project Manager" {{ old('career')=='Project Manager' ? 'selected':'' }}>Project Manager</option>
                        </optgroup>
                        <optgroup label="Education">
                            <option value="Teacher" {{ old('career')=='Teacher' ? 'selected':'' }}>Teacher</option>
                            <option value="Lecturer" {{ old('career')=='Lecturer' ? 'selected':'' }}>Lecturer</option>
                        </optgroup>
                        <optgroup label="Healthcare">
                            <option value="Nurse" {{ old('career')=='Nurse' ? 'selected':'' }}>Nurse</option>
                            <option value="Pharmacist" {{ old('career')=='Pharmacist' ? 'selected':'' }}>Pharmacist</option>
                        </optgroup>
                        <optgroup label="Creative">
                            <option value="Graphic Designer" {{ old('career')=='Graphic Designer' ? 'selected':'' }}>Graphic Designer</option>
                            <option value="Content Creator" {{ old('career')=='Content Creator' ? 'selected':'' }}>Content Creator</option>
                            <option value="Entrepreneur" {{ old('career')=='Entrepreneur' ? 'selected':'' }}>Entrepreneur</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            {{-- ── ACADEMIC SLIPS AND ATTACHMENTS ── --}}
            <div style="border-bottom: 1px solid var(--border); padding-bottom: 8px; margin-bottom: 16px; margin-top: 24px;">
                <h3 style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.6px; color: #0083A0; font-weight: 600;">Document Upload</h3>
            </div>

            <div class="grid-2" style="margin-bottom: 20px;">
                <div class="upload-zone" id="ub-academic">
                    <input type="file" name="academic_doc" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFile(this,'ub-academic','academic','Academic documents')">
                    <i class="ti ti-file-analytics upload-icon"></i>
                    <h4 class="upload-title" id="uf-academic-title">Academic documents</h4>
                    <p class="upload-sub" id="uf-academic-desc">Result slip / programme structure</p>
                </div>
                
                <div class="upload-zone" id="ub-extra">
                    <input type="file" name="extra_doc" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFile(this,'ub-extra','extra','Extra curriculum')">
                    <i class="ti ti-folder-open upload-icon"></i>
                    <h4 class="upload-title" id="uf-extra-title">Extra curriculum</h4>
                    <p class="upload-sub" id="uf-extra-desc">Programs / courses / certificates</p>
                </div>
            </div>

            {{-- ── PARSING TARGET: RESUME PROFILE ── --}}
            <div style="border-bottom: 1px solid var(--border); padding-bottom: 8px; margin-bottom: 16px; margin-top: 24px;">
                <h3 style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.6px; color: #0083A0; font-weight: 600;">Resume Profile</h3>
            </div>

            <div style="margin-bottom: 28px;">
                <div class="upload-zone" id="ub-resume">
                    <input type="file" name="resume" accept=".pdf,.doc,.docx" required onchange="handleFile(this,'ub-resume','resume','Your resume')">
                    <i class="ti ti-cloud-upload upload-icon"></i>
                    <h4 class="upload-title" id="uf-resume-title">Your resume</h4>
                    <p class="upload-sub" id="uf-resume-desc">PDF or Word document (.pdf, .doc, .docx)</p>
                </div>
            </div>

            {{-- Action Submit Tray --}}
            <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border); padding-top: 20px; flex-wrap: wrap; gap: 12px;">
                <a href="{{ route('candidate.home') }}" class="btn btn-outline">
                    <i class="ti ti-arrow-left"></i> Back
                </a>
                
                <div style="display: flex; align-items: center; gap: 10px;">
                    <button type="button" class="btn btn-secondary" onclick="clearForm()">
                        <i class="ti ti-trash"></i> Clear
                    </button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">
                        <i class="ti ti-dna"></i> Check my career match
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function handleFile(input, boxId, uniquePrefix, defaultTitle) {
    const box = document.getElementById(boxId);
    const titleNode = document.getElementById(`uf-${uniquePrefix}-title`);
    const descNode = document.getElementById(`uf-${uniquePrefix}-desc`);
    
    if (input.files && input.files[0]) {
        box.classList.add('uploaded');
        titleNode.textContent = input.files[0].name;
        descNode.innerHTML = `<span style="color: #3B6D11; display: inline-flex; align-items: center; gap: 4px;"><i class="ti ti-circle-check"></i> File staged successfully</span>`;
    } else {
        box.classList.remove('uploaded');
        titleNode.textContent = defaultTitle;
        descNode.textContent = boxId === 'ub-resume' ? 'PDF or Word document (.pdf, .doc, .docx)' : (boxId === 'ub-academic' ? 'Result slip / programme structure' : 'Programs / courses / certificates');
    }
}

function clearForm() {
    document.getElementById('guidance-form').reset();
    
    const uploads = [
        { id: 'ub-academic', prefix: 'academic', label: 'Academic documents' },
        { id: 'ub-extra', prefix: 'extra', label: 'Extra curriculum' },
        { id: 'ub-resume', prefix: 'resume', label: 'Your resume' }
    ];
    
    uploads.forEach(item => {
        const box = document.getElementById(item.id);
        box.classList.remove('uploaded');
        document.getElementById(`uf-${item.prefix}-title`).textContent = item.label;
    });
    
    document.getElementById('uf-academic-desc').textContent = 'Result slip / programme structure';
    document.getElementById('uf-extra-desc').textContent = 'Programs / courses / certificates';
    document.getElementById('uf-resume-desc').textContent = 'PDF or Word document (.pdf, .doc, .docx)';
}

document.getElementById('guidance-form').addEventListener('submit', function() {
    const btn = document.getElementById('submit-btn');
    // Note: Don't disable the button during standard GET submits or the form fields won't append to the URL parameter string.
    btn.innerHTML = `<i class="ti ti-loader animate-spin"></i> Analysing Matrix...`;
});
</script>
@endpush