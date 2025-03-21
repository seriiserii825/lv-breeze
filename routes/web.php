<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');

/**
 * ==============================
 * Student Routes
 * ==============================
 */
Route::group(['middleware' => ['auth', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/become-instructor', [StudentDashboardController::class, 'becomeIntructor'])->name('become-instructor');
    Route::post('/become-instructor/{user}', [StudentDashboardController::class, 'becomeIntructorUpdate'])->name('become-instructor.udpate');
    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/updated-password/{user}', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

/**
 * ==============================
 * Instructor Routes
 * ==============================
 */
Route::group(['middleware' => ['auth', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/{user}', [ProfileController::class, 'indexInstructor'])->name('profile.index');
    Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/updated-password/{user}', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // course

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course_id}/edit_first', [CourseController::class, 'editFirst'])->name('courses.edit.1');
    Route::post('/courses/update/1', [CourseController::class, 'updateFirst'])->name('courses.update.1');
    Route::get('/courses/{course_id}/edit/2', [CourseController::class, 'editSecond'])->name('courses.edit.2');
});

// auth and admin
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
