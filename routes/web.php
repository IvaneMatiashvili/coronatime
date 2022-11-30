<?php

use App\Http\Controllers\Auth\RegisterController;
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

//registration
Route::view('/register', 'session.register')->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/user/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('user.verify');

Route::view('/login', 'session.login')->name('login');
