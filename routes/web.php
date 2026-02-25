<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', [\App\Http\Controllers\Auth\SignupController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\Auth\SignupController::class, 'register']);

// Placeholders for other auth routes shown in the UI
Route::get('/forgot-password', function () {
    return 'Forgot Password Page';
})->name('password.request');

Route::post('/login/guest', function () {
    return 'Guest Login Route';
})->name('login.guest');

Route::get('/dashboard', function () {
    return 'Dashboard - You are logged in!';
})->name('dashboard')->middleware('auth');
