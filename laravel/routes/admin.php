<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.auth.login');
Route::middleware('auth:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home.index');
});
