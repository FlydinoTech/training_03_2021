<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\LogoutController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\IndexController;

use Illuminate\Support\Facades\Route;
Route::prefix('user')->group(function() {
//Login
Route::match(['get', 'post'], '/dang-nhap', [LoginController::class, 'login'])->name('login');
//logout
Route::get('/dang-xuat', [LogoutController::class, 'logout'])->name('logout');
//đăng ký
Route::get('/dang-ky', [RegisterController::class, 'register'])->name('register');

Route::match(['get', 'post'], '/xac-nhan-email', [RegisterController::class, 'verify'])->name('verify');
});


//home
Route::get('/', [IndexController::class, 'index'])->name('home');
//User
Route::middleware('auth')->group(function (){
   
});