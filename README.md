# Career Bank — Laravel Project Structure
## Team Guide — Each member works on their own file

---

## Folder Structure

```
resources/views/
├── layouts/
│   ├── candidate.blade.php     ← Candidate top-nav layout (shared)
│   ├── employer.blade.php      ← Employer sidebar layout (shared)
│   └── auth.blade.php          ← Login/register layout (shared)
│
├── auth/
│   ├── register.blade.php      ← Register page (Candidate + Employer)
│   └── login.blade.php         ← Login page
│
├── candidate/
│   ├── home.blade.php          ← Home + Identify Career modal + Skills popup
│   ├── jobs.blade.php          ← Find Jobs page (search + filters)
│   ├── results.blade.php       ← Career Matches page
│   ├── applications.blade.php  ← My Applications page
│   └── profile.blade.php       ← My Profile + Resume Builder
│
└── employer/
    ├── dashboard.blade.php     ← Employer Dashboard
    ├── jobs/
    │   ├── index.blade.php     ← My Job Listings
    │   └── create.blade.php    ← Post a Job
    ├── candidates.blade.php    ← Browse Candidates
    └── applicants.blade.php    ← Review Applicants

public/css/
└── app.css                     ← ALL shared styles (dark + light mode)
```

---

## Team Assignment (Suggested)

| Member | File(s) to work on |
|---|---|
| Member 1 (Fiena) | `candidate/home.blade.php` (Identify Career + Skills Popup) |
| Member 2 | `candidate/jobs.blade.php` + `candidate/results.blade.php` |
| Member 3 | `employer/dashboard.blade.php` + `employer/candidates.blade.php` |
| Member 4 | `employer/jobs/create.blade.php` + `employer/applicants.blade.php` |
| All | `auth/register.blade.php` + `auth/login.blade.php` (shared) |

---

## How to Use

### 1. Extend the layout
```blade
{{-- Candidate pages --}}
@extends('layouts.candidate')

{{-- Employer pages --}}
@extends('layouts.employer')

{{-- Auth pages --}}
@extends('layouts.auth')
```

### 2. Set page title
```blade
@section('title', 'My Page Title')
```

### 3. Write your content
```blade
@section('content')
    <div class="page">
        <!-- your HTML here -->
    </div>
@endsection
```

### 4. Add page-specific scripts
```blade
@push('scripts')
<script>
    // your JavaScript here
</script>
@endpush
```

---

## CSS Classes Quick Reference

### Layout
- `.page` — main page padding (28px 32px)
- `.grid-2` — 2-column grid
- `.grid-3` — 3-column grid
- `.grid-4` — 4-column grid

### Cards
- `.card` — standard card (bg + border + rounded)
- `.card-sm` — smaller padding card
- `.card-title` — card header with bottom border

### Form
- `.form-group` — wraps label + input
- `.form-label` — uppercase small label
- `.form-input` — styled text input
- `.form-select` — styled select dropdown
- `.form-grid-2` — 2-column form layout

### Buttons
- `.btn .btn-primary` — gold button
- `.btn .btn-secondary` — dark green button
- `.btn .btn-outline` — transparent + border button
- `.btn .btn-sm` — small size
- `.btn .btn-full` — full width

### Badges
- `.badge .badge-success` — green
- `.badge .badge-warning` — amber
- `.badge .badge-info` — blue
- `.badge .badge-danger` — red
- `.badge .badge-gold` — gold

### Modal
- `.modal-overlay` — dark backdrop (fixed, fullscreen)
- `.modal` — white modal box
- `.modal-header` / `.modal-body` / `.modal-footer`

### Popup (nested modal)
- `.popup-overlay` — darker backdrop
- `.popup` — smaller popup box
- `.popup-header` / `.popup-body` / `.popup-footer`

### Upload
- `.upload-zone` — dashed upload area
- `.upload-zone.uploaded` — green state after upload

### Skill Bars
- `.skill-bar` — wrapper
- `.skill-bar-header` — label row
- `.skill-bar-track` — grey track
- `.skill-bar-fill` — gold fill
- `.skill-bar-fill.danger` — red fill

### Requirement Boxes
- `.req-box .req-box-have` — green box (skills you have)
- `.req-box .req-box-need` — red box (skills you need)
- `.req-item` — individual skill row

### AI Box
- `.ai-box` — left gold border tip box
- `.ai-box-icon` / `.ai-box-title` / `.ai-box-text`

---

## JavaScript Helpers (available in all candidate pages)

```javascript
// Show/close modal
showModal('modal-id')
closeModal('modal-id')

// Show/close popup (nested)
showPopup('popup-id')
closePopup('popup-id')

// File upload feedback
fileSelected(inputEl, 'zone-id', 'filename-id', 'filesize-id')

// Auto-hide toast after N ms
autoHideToast('toast-id', 4000)

// Toggle dark/light theme
toggleTheme()
```

---

## Run the project
```bash
php artisan serve
```

Then open: `http://localhost:8000`

| URL | Page |
|---|---|
| `/register` | Register / Login |
| `/` | Candidate Home |
| `/jobs` | Find Jobs |
| `/career-matches` | Career Matches |
| `/applications` | My Applications |
| `/profile` | My Profile |
| `/employer/dashboard` | Employer Dashboard |
| `/employer/jobs/create` | Post a Job |
| `/employer/jobs` | My Listings |
| `/employer/candidates` | Browse Candidates |
| `/employer/applicants` | Review Applicants |
