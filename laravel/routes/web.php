<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/dang-nhap', [LoginController::class, 'login'])->name('user.auth.login');

Route::get('/', [HomeController::class, 'index'])->name('user.home.index');

Route::get('layout-admin', function () {
    return view('admin.layouts.master');
});
