<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\InstructorRequestsController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseLanguageController;
use App\Http\Controllers\Admin\CourseLevelController;
use App\Http\Controllers\Admin\CourseSubCategoryRessource;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "guest:admin", "prefix" => "admin", "as" => "admin."], function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(["middleware" => "auth:admin", "prefix" => "admin", "as" => "admin."], function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('instructor-requests', InstructorRequestsController::class);
    Route::resource('course-languages', CourseLanguageController::class);
    Route::resource('course-levels', CourseLevelController::class);
    Route::resource('course-categories', CourseCategoryController::class);
    Route::get('{course_category}/course-subcategories', [CourseSubCategoryRessource::class, 'index'])->name('course-subcategories.index');
    Route::get('{course_category}/course-subcategories/create', [CourseSubCategoryRessource::class, 'create'])->name('course-subcategories.create');
    Route::post('{course_category}/course-subcategories', [CourseSubCategoryRessource::class, 'store'])->name('course-subcategories.store');
    Route::get('{course_category}/course-subcategories/{subcategory}', [CourseSubCategoryRessource::class, 'edit'])->name('course-subcategories.edit');
    Route::put('{course_category}/course-subcategories/{subcategory}', [CourseSubCategoryRessource::class, 'update'])->name('course-subcategories.update');
    Route::delete('{course_category}/course-subcategories/{subcategory}', [CourseSubCategoryRessource::class, 'destroy'])->name('course-subcategories.destroy');
});
