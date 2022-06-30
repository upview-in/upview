<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password/verify', [PasswordResetController::class, 'check'])
    ->middleware(['guest', 'throttle:20,1'])
    ->name('password.check');

Route::get('/forgot-password/send-otp', [PasswordResetController::class, 'send'])
    ->middleware('guest')
    ->name('password.sendOTP');

Route::get('/reset-password', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verification', [VerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.show');

Route::post('/verification', [VerificationController::class, 'check'])
    ->middleware(['auth', 'throttle:20,1'])
    ->name('verification.check');

Route::get('/verification/send-otp', [VerificationController::class, 'send'])
    ->middleware(['auth', 'throttle:10,1'])
    ->name('verification.sendOTP');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
