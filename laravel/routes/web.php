<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\LogoutController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ProfileController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Course\DetailCourseController;
use App\Http\Controllers\User\IndexController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//home
Route::get('/home', [IndexController::class, 'index'])->name('user.home');
//tìm kiếm
Route::get('/tim-kiem-khoa-hoc', [IndexController::class, 'search'])->name('user.course.searchCourse');

Route::get('/', [IndexController::class, 'index']);

//danh sách khóa học
Route::prefix('course')->group(function () {
    Route::get('/chi-tiet-khoa-hoc/{id}', [DetailCourseController::class, 'detailCourse'])->name('user.course.detailCourse');
});
//chưa đăng nhập
Route::middleware('guest')->group(function () {
    Route::prefix('user')->group(function () {
        //Login
        Route::match(['get', 'post'], '/dang-nhap', [LoginController::class, 'login'])->name('user.auth.login');

        //đăng ký
        Route::get('/dang-ky', [RegisterController::class, 'register'])->name('user.auth.register');
        Route::post('/dang-ky', [RegisterController::class, 'smRegister'])->name('user.auth.smRegister');
        //xác nhận email đăng ký
        Route::match(['get', 'post'], '/xac-nhan-email', [RegisterController::class, 'verify'])->name('user.auth.verifyRegister');
        //quên mật khẩu
        Route::get('/quen-mat-khau', [ForgotPasswordController::class, 'forgotPassword'])->name('user.auth.forgotPassword');
        Route::post('/quen-mat-khau', [ForgotPasswordController::class, 'findEmail'])->name('user.auth.findEmail');
        //xác nhận email quên mật khẩu
        Route::match(['get', 'post'], '/xac-nhan-email-dang-ky', [ForgotPasswordController::class, 'verifyForgotPassWord'])->name('user.auth.verifyForgotPassWord');
        //đổi password thành công
        Route::match(['get', 'post'], '/doi-mat-khau-thanh-cong', [ForgotPasswordController::class, 'newPassword'])->name('user.auth.newPassword');
    });
});

//đã đăng nhập
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        //logout
        Route::get('/dang-xuat', [LogoutController::class, 'logout'])->name('user.auth.logout');

        //thông tin ngwoif dùng
        Route::get('/trang-ca-nhan', [ProfileController::class, 'profile'])->name('user.auth.profile');
        Route::get('/sua-trang-ca-nhan', [ProfileController::class, 'editProfile'])->name('user.auth.editProfile');
        Route::post('/xac-nhan-sua-trang-ca-nhan', [ProfileController::class, 'smeditProfile'])->name('user.auth.smEditProfile');

        //danh sách khóa học
        Route::prefix('course')->group(function () {
            Route::get('/dang-ky-khoa-hoc/{id}', [DetailCourseController::class, 'register'])->name('user.course.register');
            Route::post('/dang-ky-khoa-hoc/{id}', [DetailCourseController::class, 'smRegister'])->name('user.course.register');
        });
    });
});