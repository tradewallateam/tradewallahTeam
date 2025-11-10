<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->prefix('admin')->group(function () {
    Route::get('dashboard', 'index')->name('admin.dashboard');
});
