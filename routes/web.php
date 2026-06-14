<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
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