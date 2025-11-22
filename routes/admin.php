<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->prefix('auth/admin')->name('auth.admin.login.')->group(function () {
    Route::get('login', 'showLoginForm')->name('form');
    Route::post('login', 'login')->name('submit');
});

Route::middleware(['auth.check', 'clear.cache'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');

        Route::get('logout/{id}', 'logout')->name('logout');
    });

    Route::controller(MemberController::class)->group(function () {
        Route::get('members', 'index')->name('members');
    });
});
