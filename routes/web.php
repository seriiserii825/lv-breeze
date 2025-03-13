<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');

/**
 * ==============================
 * Student Routes
 * ==============================
 */
Route::group(['middleware' => ['auth', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

/**
 * ==============================
 * Instructor Routes
 * ==============================
 */
Route::group(['middleware' => ['auth', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
});

// auth and admin
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
