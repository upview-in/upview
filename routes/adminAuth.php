<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest:admin')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest:admin');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('admin:admin')->name('logout');
