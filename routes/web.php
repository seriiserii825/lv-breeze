<?php

use App\Http\Controllers\Frontend\CourseChapterController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use App\Models\CourseChapter;
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
    // course create
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit/{step}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/{course}/update/{step}', [CourseController::class, "update"])->name('courses.update');
    Route::post('/courses/create-lesson', [CourseController::class, 'createLesson'])->name('courses.create-lesson');
    Route::get('/courses/edit-lesson', [CourseController::class, 'editLesson'])->name("courses.edit-lesson");
    Route::post('/courses/update-lesson', [CourseController::class, 'updateLesson'])->name('courses.update-lesson');

    // Modals
    Route::get('/modal/modal-create-chapter', [CourseController::class, "modalCreateChapter"])->name('courses.modal-create-chapter');
    Route::get('/modal/modal-create-lesson', [CourseController::class, "modalCreateLesson"])->name('courses.modal-create-lesson');

    // Course Chapters
    Route::resource('course-chapters', CourseChapterController::class);

    // // course edit first
    // Route::get('/courses/{course}/edit_first', [CourseController::class, 'editFirst'])->name('courses.edit.1');
    // Route::post('/courses/update/first', [CourseController::class, 'updateFirst'])->name('courses.update.1');
    // //course edit second
    // Route::get('/courses/{course}/edit/2', [CourseController::class, 'editSecond'])->name('courses.edit.2');
});

// auth and admin
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
