<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes — Clickable Prototype Setup
|--------------------------------------------------------------------------
*/

// ── CORE PUBLIC PAGES ──
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');


// ── AUTHENTICATION ──
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// ── 🌟 DESIGN-SAFE FLAT APPLICATION PATH (Bypasses relative folder asset locks) ──
Route::get('applications-dashboard', function (Request $request) {
    $allApplications = collect([
        (object)[
            'id' => 1,
            'job_title' => 'Frontend Developer',
            'company_name' => 'MetaSkore Solutions',
            'company_color' => '#3b82f6',
            'status' => 'pending',
            'location' => 'Kuala Lumpur',
            'job_type' => 'Full-time',
            'salary_range' => 'RM 5,000 - RM 7,000',
            'created_at' => now()->subDays(2)
        ],
        (object)[
            'id' => 2,
            'job_title' => 'UI/UX Designer',
            'company_name' => 'Creative Hub',
            'company_color' => '#ec4899',
            'status' => 'reviewed',
            'location' => 'Penang',
            'job_type' => 'Remote',
            'salary_range' => 'RM 4,500 - RM 6,000',
            'created_at' => now()->subDays(5)
        ],
        (object)[
            'id' => 3,
            'job_title' => 'Junior Laravel Engineer',
            'company_name' => 'TechBank Corp',
            'company_color' => '#10b981',
            'status' => 'accepted',
            'location' => 'Selangor',
            'job_type' => 'Full-time',
            'salary_range' => 'RM 4,000 - RM 5,500',
            'created_at' => now()->subDays(12)
        ]
    ]);

    $currentFilter = $request->query('filter', 'all');
    $applications = ($currentFilter !== 'all') ? $allApplications->where('status', $currentFilter) : $allApplications;

    $stats = [
        'total' => $allApplications->count(),
        'pending' => $allApplications->where('status', 'pending')->count(),
        'accepted' => $allApplications->where('status', 'accepted')->count(),
        'reviewed' => $allApplications->where('status', 'reviewed')->count(),
    ];

    return view('candidate.applications', compact('applications', 'stats', 'currentFilter'));
})->name('applications.index');


// ── DUAL NAMING LAYER ALIASES FOR GLOBAL SAFETY ──
Route::get('/home', function () { return view('candidate.home'); })->name('home');
Route::get('/candidate/jobs', function () { return view('candidate.jobs'); })->name('jobs.index');


// ── CANDIDATE DASHBOARD MODULES ──
Route::prefix('candidate')->name('candidate.')->group(function () {
    
    Route::get('/home', function () {
        return view('candidate.home'); 
    })->name('home');

    Route::get('/career/home', function () {
        return view('candidate.home');
    })->name('career.home');

    Route::get('/dashboard/home', function () {
        return view('candidate.home');
    })->name('index');

    // ── THE WIZARD FLOW ──
    Route::get('/guidance', function () {
        return view('candidate.guidance');
    })->name('career.guidance'); 

    Route::get('/guidance/alt', function () {
        return view('candidate.guidance');
    })->name('guidance');

    Route::get('/loading', function () {
        return view('candidate.loading');
    })->name('career.loading');

    Route::get('/loading/wait', function () {
        return view('candidate.loading');
    })->name('loading');

    Route::get('/result', function () {
        $analysis = [
            'career' => 'AI Prompt Engineer & Solutions Architect',
            'name' => request('full_name', 'Alex Mercer'),
            'institution' => request('institution', 'Universiti Malaya'),
            'field' => 'Computer Science (Data Analytics)',
            'score' => 84,
            'met' => [
                'Proficiency in Python & Frameworks (FastAPI, LangChain)',
                'Core understanding of Large Language Models (LLMs)',
                'Strong baseline in Structured Query Languages (PostgreSQL)'
            ],
            'missing' => [
                [
                    'skill' => 'Cloud Vector Architecture Deployment',
                    'tip' => 'Look into Pinecone or Milvus integration roadmaps on AWS.'
                ],
                [
                    'skill' => 'Advanced Prompt Evaluation Frameworks',
                    'tip' => 'Read up on RAG (Retrieval-Augmented Generation) optimization patterns.'
                ]
            ],
            'ai_advice' => 'Your academic tracking markers point to excellent technical readiness. Prioritize practical application frameworks over purely theoretical deep learning mathematics.'
        ];
        return view('candidate.result', compact('analysis'));
    })->name('candidate.result');

    Route::get('/job/home', function () {
        return view('candidate.home'); 
    })->name('job.home');

    Route::get('/jobs', function () {
        return view('candidate.jobs');
    })->name('jobs');

    Route::get('/profile', function () {
        return view('candidate.profile');
    })->name('profile');
});


// ── GLOBAL REDIRECTS FOR ROBUST NAVIGATION LINKS ──
Route::get('/candidate/application', function() { return redirect('/applications-dashboard'); });
Route::get('/candidate/applications', function() { return redirect('/applications-dashboard'); });
Route::get('/candidate/applications-dashboard', function() { return redirect('/applications-dashboard'); });
Route::get('/applications-dashboard-view', function() { return redirect('/applications-dashboard'); });


// ── EMPLOYER WORKSPACE PIPELINE ──
Route::prefix('employer')->name('employer.')->group(function () {
    Route::get('/', function () { return view('employer_dashboard'); })->name('dashboard');
    Route::get('/jobs/create', function () { return view('employer_jobs_create'); })->name('jobs.create');
    Route::get('/jobs', function () { return view('employer_jobs_index'); })->name('jobs.index');
    Route::get('/candidates', function () { return view('employer_candidates'); })->name('candidates');
    Route::get('/profile', function () { return view('employer_profile'); })->name('profile');
    Route::get('/settings', function () { return view('employer_settings'); })->name('settings');
});

Route::get('/candidate/resume-builder', function () {
    return view('candidate.resume-builder');
})->name('resume.builder');

// ── FORCE SYSTEM FLUSH UTILITIES ──
Route::get('/clear-all', function() {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    // Artisan::call('cache:clear');
    return "Cache cleared successfully!";
});