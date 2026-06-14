<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerGuidanceController;

// Home dashboard
Route::get('/', [CareerGuidanceController::class, 'home'])->name('home');

// Career Guidance module
Route::prefix('guidance')->name('guidance.')->group(function () {
    Route::get('/',         [CareerGuidanceController::class, 'index'])   ->name('index');
    Route::post('/analyse', [CareerGuidanceController::class, 'analyse']) ->name('analyse');
    Route::post('/result',  [CareerGuidanceController::class, 'result'])  ->name('result');
});
