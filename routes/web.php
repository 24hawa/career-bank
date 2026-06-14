<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerGuidanceController;

Route::get('/', function () {
    return view('landing');
    });
// Home dashboard
Route::get('/', [CareerGuidanceController::class, 'home'])->name('home');

// Career Guidance module
Route::prefix('guidance')->name('guidance.')->group(function () {
    Route::get('/',         [CareerGuidanceController::class, 'index'])   ->name('index');
    Route::post('/analyse', [CareerGuidanceController::class, 'analyse']) ->name('analyse');
    Route::post('/result',  [CareerGuidanceController::class, 'result'])  ->name('result');
});

Route::get('/dummy-login', function () {
    return "This is a temporary Login Page placeholder.";
})->name('login');

Route::get('/dummy-register', function () {
    return "This is a temporary Registration Page placeholder. Role selected: " . request('role');
})->name('register');

Route::get('/about', function () {
    return view('about');
});