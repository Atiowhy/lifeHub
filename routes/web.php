<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
// Route::get('/', function () {
//     return view('welcome');
// });

// auth route
Route::prefix('auth')->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/actionRegister', [RegisterController::class, 'actionRegister'])->name('actionRegister');
    Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::get('/forgotPass', [ForgotPassController::class, 'index'])->name('forgotPass');
    Route::post('/resetPassLink', [ForgotPassController::class, 'sendLink'])->name('resetPassLink');
    Route::get('/reset-password/{token}', [ForgotPassController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPassController::class, 'reset'])->name('password.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//dashboard route
Route::prefix('dashboard')->group(function() {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::get('general', [DashboardController::class, 'generalDash'])->name('general');
    Route::get('article', [DashboardController::class, 'articleDash'])->name('article');
});

    // profile route
Route::prefix('profile')->group(function() {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('update', [ProfileController::class,'update'])->name('update');
});
