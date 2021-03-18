<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgetController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ResetController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
Route::get('/forget', [ForgetController::class, 'forget'])->name('admin.forget');
Route::post('/forget', [ForgetController::class, 'postForget'])->name('admin.forget');
Route::get('/reset', [ResetController::class, 'reset'])->name('admin.reset');
Route::post('/reset', [ResetController::class, 'postReset'])->name('admin.reset');

//Admin
Route::middleware('auth:admin')->group(function () {
    //Dashboard
    Route::get('/', [IndexController::class, 'index'])->name('admin.index.index');
    //Account
    Route::prefix('/account')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.admin.index');
        Route::get('/add', [AdminController::class, 'add'])->name('admin.admin.add');
        Route::post('/add', [AdminController::class, 'postAdd'])->name('admin.admin.add');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
        Route::post('/edit/{id}', [AdminController::class, 'postEdit'])->name('admin.admin.edit');
        Route::get('/del/{id}', [AdminController::class, 'del'])->name('admin.admin.del');
    });
    //Course
    Route::prefix('/course')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/add', [CourseController::class, 'add'])->name('admin.course.add');
        Route::post('/add', [CourseController::class, 'postAdd'])->name('admin.course.add');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/edit/{id}', [CourseController::class, 'postEdit'])->name('admin.course.edit');
        Route::get('/del/{id}', [CourseController::class, 'del'])->name('admin.course.del');
    });
    //Schedule
    Route::prefix('/schedule')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('admin.schedule.index');
        Route::get('/add', [ScheduleController::class, 'add'])->name('admin.schedule.add');
        Route::post('/add', [ScheduleController::class, 'postAdd'])->name('admin.schedule.add');
        Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('admin.schedule.edit');
        Route::post('/edit/{id}', [ScheduleController::class, 'postEdit'])->name('admin.schedule.edit');
        Route::get('/del/{id}', [ScheduleController::class, 'del'])->name('admin.schedule.del');
    });
});
