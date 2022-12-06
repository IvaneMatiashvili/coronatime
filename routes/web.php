<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardPageController;
use App\Http\Controllers\LanguageController;
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
//language switcher
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

//dashboard
Route::middleware(['auth', 'setLocale'])->group(function () {
	Route::get('/', [DashboardPageController::class, 'index'])->name('dashboard');
	Route::get('/country-statistics', [DashboardPageController::class, 'showCountriesStatistics'])->name('dashboard.country-statistics');
	Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//registration
Route::middleware(['guest', 'setLocale'])->group(function () {
	Route::view('/register', 'session.register')->name('register');
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/user/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('user.verify');
});

//login
Route::middleware(['guest', 'setLocale'])->group(function () {
	Route::view('/login', 'session.login')->name('login');
	Route::post('/login', [LoginController::class, 'login']);
});

//reset password
Route::middleware('setLocale')->group(function () {
	Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
	Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
	Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
	Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
