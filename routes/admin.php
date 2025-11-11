<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->prefix('auth/admin')->group(function () {
    Route::get('login', 'showLoginForm')->name('auth.admin.login.form');
    Route::post('login', 'login')->name('auth.admin.login.submit');
});

Route::controller(DashboardController::class)->prefix('admin')->group(function () {
    Route::get('dashboard', 'index')->name('admin.dashboard');
});
