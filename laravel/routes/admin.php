<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/forgot', [ResetPasswordController::class, 'formSendEmailConfirmationCode'])->name('admin.forgot');
Route::post('/forgot', [ResetPasswordController::class, 'sendEmailConfirmationCode'])->name('admin.forgot');
Route::get('/reset', [ResetPasswordController::class, 'formResetPassword'])->name('admin.reset');
Route::post('/reset', [ResetPasswordController::class, 'resetPassword'])->name('admin.reset');

Route::middleware('auth:admin')->name('admin.')->group(function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    // Course
    Route::resource('/course', CourseController::class);
    // Profile
    Route::resource('/profile', ProfileController::class)->only(['index', 'update']);
    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
