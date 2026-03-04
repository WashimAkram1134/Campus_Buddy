<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassTaskController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Models\ClassTask;
use App\Models\Announcement;
use App\Models\Schedule;
use Illuminate\Support\Facades\Route;

// Show landing page on root
Route::get('/', function () {
    return view('landing');
});

// Auth routes
Route::get('/login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class , 'login']);
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');

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
    $user = auth()->user();

    $announcements = Announcement::where('department', $user->department)
        ->where('batch', $user->batch)
        ->where('section', $user->section)
        ->where(function ($query) use ($user) {
            if ($user->major) {
                $query->where('major', $user->major);
            }
            else {
                $query->whereNull('major')->orWhere('major', '');
            }
        }
        )
            ->latest()
            ->get();

        $assignments = ClassTask::where('department', $user->department)
            ->where('batch', $user->batch)
            ->where('section', $user->section)
            ->where(function ($query) use ($user) {
            if ($user->major) {
                $query->where('major', $user->major);
            }
            else {
                $query->whereNull('major')->orWhere('major', '');
            }
        }
        )
            ->latest()
            ->get();

        $todaySchedule = Schedule::where('department', $user->department)
            ->where('batch', $user->batch)
            ->where('section', $user->section)
            ->where('day', now()->format('l'))
            ->where(function ($query) use ($user) {
            if ($user->major) {
                $query->where('major', $user->major);
            }
            else {
                $query->whereNull('major')->orWhere('major', '');
            }
        }
        )
            ->orderBy('time_slot')
            ->get();

        return view('dashboard', compact('announcements', 'assignments', 'todaySchedule'));
    })->name('dashboard')->middleware('auth');

Route::get('/cr-dashboard', function () {
    return view('cr-dashboard');
})->name('cr-dashboard')->middleware('auth');

Route::post('/assignments', [ClassTaskController::class , 'store'])->name('assignments.store')->middleware('auth');
Route::post('/announcements', [AnnouncementController::class , 'store'])->name('announcements.store')->middleware('auth');
Route::post('/profile/update', [ProfileController::class , 'update'])->name('profile.update')->middleware('auth');


Route::get('/routine', [ScheduleController::class , 'index'])->name('routine')->middleware('auth');
Route::post('/schedule', [ScheduleController::class , 'store'])->name('schedule.store')->middleware('auth');
Route::put('/schedule/{schedule}', [ScheduleController::class , 'update'])->name('schedule.update')->middleware('auth');
Route::delete('/schedule/{schedule}', [ScheduleController::class , 'destroy'])->name('schedule.destroy')->middleware('auth');

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

Route::get('/classtask', [ClassTaskController::class , 'index'])->name('classtask')->middleware('auth');
Route::put('/classtask/{task}', [ClassTaskController::class , 'update'])->name('classtask.update')->middleware('auth');
Route::delete('/classtask/{task}', [ClassTaskController::class , 'destroy'])->name('classtask.destroy')->middleware('auth');