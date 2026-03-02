<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Auth routes
Route::get('/login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class , 'login']);

Route::get('/signup', [\App\Http\Controllers\Auth\SignupController::class , 'showRegistrationForm'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\Auth\SignupController::class , 'register']);

// Placeholders for other auth routes shown in the UI
Route::get('/forgot-password', function () {
    return 'Forgot Password Page';
})->name('password.request');

Route::post('/login/guest', function () {
    return 'Guest Login Route';
})->name('login.guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/cr-dashboard', function () {
    return view('cr-dashboard');
})->name('cr-dashboard')->middleware('auth');

Route::get('/routine', function () {
    return view('routine');
})->name('routine')->middleware('auth');

Route::get('/question-bank', function () {
    return view('questionbank');
})->name('question-bank')->middleware('auth');

Route::get('/community', function () {
    return view('community');
})->name('community')->middleware('auth');

Route::get('/notes', function () {
    return view('notes');
})->name('notes')->middleware('auth');

Route::get('/alumni', function () {
    return view('alumni');
})->name('alumni')->middleware('auth');

Route::get('/clubs', function () {
    return view('clubs');
})->name('clubs')->middleware('auth');

Route::get('/classtask', function () {
    return view('classtask');
})->name('classtask')->middleware('auth');