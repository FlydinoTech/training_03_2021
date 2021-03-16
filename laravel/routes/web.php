<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;


//Login
Route::match(['get', 'post'], '/dang-nhap', [LoginController::class, 'login'])->name('login');

//User
Route::middleware('auth')->group(function (){
    Route::get('/', [IndexController::class, 'index'])->name('home');
});