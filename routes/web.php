<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ClassTaskController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC ROUTES ====================

// Landing Page
Route::get('/', [PageController::class, 'landing'])->name('landing');

// Buddy Visitor (no auth required)
Route::get('/buddy-visitor', [PageController::class, 'buddyVisitor'])->name('buddy-visitor');

// ==================== AUTH ROUTES ====================

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [\App\Http\Controllers\Auth\SignupController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\Auth\SignupController::class, 'register']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.reset.update');

Route::post('/login/guest', function () {
    return 'Guest Login Route';
})->name('login.guest');

// ==================== AUTHENTICATED ROUTES ====================

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// CR Dashboard
Route::get('/cr-dashboard', [PageController::class, 'crDashboard'])->name('cr-dashboard')->middleware('auth');

// Buddy AI Chat
Route::get('/buddy-chat', [PageController::class, 'buddyChat'])->name('buddy-chat')->middleware('auth');

// Schedule/Routine
Route::get('/routine', [ScheduleController::class, 'index'])->name('routine')->middleware('auth');
Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store')->middleware('auth');
Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update')->middleware('auth');
Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy')->middleware('auth');

// Class Tasks
Route::get('/classtask', [ClassTaskController::class, 'index'])->name('classtask')->middleware('auth');
Route::post('/assignments', [ClassTaskController::class, 'store'])->name('assignments.store')->middleware('auth');
Route::put('/classtask/{task}', [ClassTaskController::class, 'update'])->name('classtask.update')->middleware('auth');
Route::delete('/classtask/{task}', [ClassTaskController::class, 'destroy'])->name('classtask.destroy')->middleware('auth');
Route::post('/classtask/{task}/complete', [ClassTaskController::class, 'complete'])->name('classtask.complete')->middleware('auth');

// Announcements
Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store')->middleware('auth');

// Notes/Materials
Route::get('/notes', [NotesController::class, 'index'])->name('notes')->middleware('auth');
Route::post('/materials', [\App\Http\Controllers\MaterialController::class, 'store'])->name('materials.store')->middleware('auth');

// Clubs
Route::get('/clubs', [ClubController::class, 'index'])->name('clubs')->middleware('auth');

// Question Bank
Route::get('/question-bank', [\App\Http\Controllers\QuestionBankController::class, 'index'])->name('question-bank')->middleware('auth');
Route::post('/question-bank', [\App\Http\Controllers\QuestionBankController::class, 'store'])->name('question-bank.store')->middleware('auth');

// Community
Route::get('/community', [CommunityController::class, 'index'])->name('community')->middleware('auth');
Route::post('/community/post', [CommunityController::class, 'storePost'])->name('community.post.store')->middleware('auth');
Route::post('/community/post/{post}/like', [CommunityController::class, 'like'])->name('community.post.like')->middleware('auth');
Route::post('/community/post/{post}/comment', [CommunityController::class, 'comment'])->name('community.post.comment')->middleware('auth');
Route::put('/community/comment/{comment}', [CommunityController::class, 'updateComment'])->name('community.comment.update')->middleware('auth');
Route::delete('/community/comment/{comment}', [CommunityController::class, 'destroyComment'])->name('community.comment.destroy')->middleware('auth');
Route::post('/community/comment/{comment}/like', [CommunityController::class, 'likeComment'])->name('community.comment.like')->middleware('auth');
Route::post('/community/comment/{comment}/reply', [CommunityController::class, 'replyComment'])->name('community.comment.reply')->middleware('auth');

// Talents
Route::get('/talents', [\App\Http\Controllers\TalentController::class, 'index'])->name('talents')->middleware('auth');
Route::post('/talents', [\App\Http\Controllers\TalentController::class, 'store'])->name('talents.store')->middleware('auth');

// Alumni
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni')->middleware('auth');
Route::post('/alumni/register', [AlumniController::class, 'store'])->name('alumni.register')->middleware('auth');

// Events
Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware('auth');

// Profile
Route::match(['post', 'patch'], '/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings')->middleware('auth');
Route::patch('/profile/settings', [ProfileController::class, 'updateSettings'])->name('profile.settings.update')->middleware('auth');
Route::delete('/profile/image', [ProfileController::class, 'deleteProfileImage'])->name('profile.image.delete')->middleware('auth');
