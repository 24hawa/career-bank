<?php

use Illuminate\Support\Facades\Route;

// ── AUTH ──
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// ── CANDIDATE ──
Route::get('/', function () {
    return view('candidate.home');
})->name('home');

Route::get('/jobs', function () {
    return view('candidate.jobs');
})->name('candidate.jobs');

Route::get('/career-matches', function () {
    return view('candidate.home');
})->name('candidate.results');

Route::get('/applications', function () {
    return view('candidate.home');
})->name('candidate.applications');

Route::get('/profile', function () {
    return view('candidate.home');
})->name('candidate.profile');

Route::post('/identify', function () {
    return back();
})->name('candidate.identify');

// ── EMPLOYER ──
Route::get('/employer/dashboard', function () {
    return view('candidate.home');
})->name('employer.dashboard');

Route::get('/employer/jobs', function () {
    return view('candidate.home');
})->name('employer.jobs.index');

Route::get('/employer/jobs/create', function () {
    return view('candidate.home');
})->name('employer.jobs.create');

Route::get('/employer/candidates', function () {
    return view('candidate.home');
})->name('employer.candidates');

Route::get('/employer/applicants', function () {
    return view('candidate.home');
})->name('employer.applicants');