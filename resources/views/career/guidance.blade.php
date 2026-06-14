@extends('layouts.app')

@section('content')

<div class="pg-label">Career OS — Step 3</div>
<div class="pg-title">Career Guidance</div>
<div class="pg-sub">Fill in your details and upload your documents so we can analyse your career fit.</div>

@if($errors->any())
<div class="alert alert-error">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
</div>
@endif

<div class="form-card">
    <form action="{{ route('guidance.analyse') }}" method="POST" enctype="multipart/form-data" id="guidance-form">
        @csrf

        <div class="form-grid">
            <div class="fg">
                <label for="full_name">Full name</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="e.g. Shafiena" required>
            </div>
            <div class="fg">
                <label for="institution">Institution</label>
                <input type="text" id="institution" name="institution" value="{{ old('institution') }}" placeholder="e.g. UPSI" required>
            </div>
            <div class="fg">
                <label for="field">Field / discipline</label>
                <input type="text" id="field" name="field" value="{{ old('field') }}" placeholder="e.g. Computer Science" required>
            </div>
            <div class="fg">
                <label for="career">Select career to check</label>
                <select id="career" name="career" required>
                    <option value="" disabled selected>Choose a career...</option>
                    <optgroup label="Technology">
                        <option value="Software Engineer"    {{ old('career')=='Software Engineer'    ? 'selected':'' }}>Software Engineer</option>
                        <option value="Data Analyst"         {{ old('career')=='Data Analyst'         ? 'selected':'' }}>Data Analyst</option>
                        <option value="UI/UX Designer"       {{ old('career')=='UI/UX Designer'       ? 'selected':'' }}>UI/UX Designer</option>
                        <option value="Cybersecurity Analyst"{{ old('career')=='Cybersecurity Analyst'? 'selected':'' }}>Cybersecurity Analyst</option>
                        <option value="AI/ML Engineer"       {{ old('career')=='AI/ML Engineer'       ? 'selected':'' }}>AI/ML Engineer</option>
                    </optgroup>
                    <optgroup label="Business">
                        <option value="Marketing Executive"      {{ old('career')=='Marketing Executive'      ? 'selected':'' }}>Marketing Executive</option>
                        <option value="Human Resource Executive" {{ old('career')=='Human Resource Executive' ? 'selected':'' }}>Human Resource Executive</option>
                        <option value="Business Analyst"         {{ old('career')=='Business Analyst'         ? 'selected':'' }}>Business Analyst</option>
                        <option value="Accountant"               {{ old('career')=='Accountant'               ? 'selected':'' }}>Accountant</option>
                        <option value="Project Manager"          {{ old('career')=='Project Manager'          ? 'selected':'' }}>Project Manager</option>
                    </optgroup>
                    <optgroup label="Education">
                        <option value="Teacher"              {{ old('career')=='Teacher'    ? 'selected':'' }}>Teacher</option>
                        <option value="Lecturer"             {{ old('career')=='Lecturer'   ? 'selected':'' }}>Lecturer</option>
                    </optgroup>
                    <optgroup label="Healthcare">
                        <option value="Nurse"                {{ old('career')=='Nurse'      ? 'selected':'' }}>Nurse</option>
                        <option value="Pharmacist"           {{ old('career')=='Pharmacist' ? 'selected':'' }}>Pharmacist</option>
                    </optgroup>
                    <optgroup label="Creative">
                        <option value="Graphic Designer"     {{ old('career')=='Graphic Designer' ? 'selected':'' }}>Graphic Designer</option>
                        <option value="Content Creator"      {{ old('career')=='Content Creator'  ? 'selected':'' }}>Content Creator</option>
                        <option value="Entrepreneur"         {{ old('career')=='Entrepreneur'     ? 'selected':'' }}>Entrepreneur</option>
                    </optgroup>
                </select>
            </div>
        </div>

        <div class="divider"><span>Document upload</span></div>

        <div class="upload-grid">
            <div class="ubox" id="ub-academic">
                <input type="file" name="academic_doc" accept=".pdf,.jpg,.jpeg,.png"
                       onchange="handleFile(this,'ub-academic','uf-academic')">
                <div class="uicon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <h4>Academic documents</h4>
                <p>Result slip / programme structure</p>
                <div class="fname" id="uf-academic"></div>
            </div>
            <div class="ubox" id="ub-extra">
                <input type="file" name="extra_doc" accept=".pdf,.jpg,.jpeg,.png"
                       onchange="handleFile(this,'ub-extra','uf-extra')">
                <div class="uicon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                </div>
                <h4>Extra curriculum</h4>
                <p>Programs / courses / certificates</p>
                <div class="fname" id="uf-extra"></div>
            </div>
        </div>

        <div class="divider"><span>Resume</span></div>

        <div class="upload-grid upload-single">
            <div class="ubox" id="ub-resume">
                <input type="file" name="resume" accept=".pdf,.doc,.docx" required
                       onchange="handleFile(this,'ub-resume','uf-resume')">
                <div class="uicon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 16 12 12 8 16"/><line x1="12" y1="12" x2="12" y2="21"/><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"/></svg>
                </div>
                <h4>Your resume</h4>
                <p>PDF or Word document (.pdf, .doc, .docx)</p>
                <div class="fname" id="uf-resume"></div>
            </div>
        </div>

        {{-- Buttons: Back on left, Clear + Submit on right --}}
        <div class="btn-row">
            <a href="{{ route('home') }}" class="btn-back">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back
            </a>
            <div class="btn-row-right">
                <button type="button" class="btn btn-ghost" onclick="clearForm()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    Clear
                </button>
                <button type="submit" class="btn btn-yellow" id="submit-btn">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    Check my career match
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
function handleFile(input, boxId, nameId) {
    const box = document.getElementById(boxId);
    const nm  = document.getElementById(nameId);
    if (input.files && input.files[0]) {
        box.classList.add('done');
        nm.textContent = input.files[0].name;
    } else {
        box.classList.remove('done');
        nm.textContent = '';
    }
}

function clearForm() {
    document.getElementById('guidance-form').reset();
    ['ub-academic','ub-extra','ub-resume'].forEach(id => document.getElementById(id).classList.remove('done'));
    ['uf-academic','uf-extra','uf-resume'].forEach(id => document.getElementById(id).textContent = '');
}

document.getElementById('guidance-form').addEventListener('submit', function() {
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.innerHTML = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin .8s linear infinite"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg> Analysing...';
});
</script>
<style>@keyframes spin{to{transform:rotate(360deg)}}</style>
@endpush
