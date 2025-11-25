<?php

use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\ContactController;
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

    Route::controller(ContactController::class)->group(function () {
        Route::get('contacts', 'index')->name('contacts');
    });

    Route::controller(CMSController::class)->prefix('pages')->name('pages.')->group(function () {
        Route::prefix('cms')->name('cms.')->group(function () {
            Route::get('manage-header', 'manageHeader')->name('manage-header');
            Route::post('update-header', 'updateHeader')->name('update-header');

            Route::get('manage-social-media', 'manageSocialMedia')->name('manage-social-media');
            Route::post('update-social-media', 'updateSocialMedia')->name('update-social-media');

            Route::get('manage-page/about', 'managePage')->name('manage-page');
            Route::post('update-page/about', 'updateAboutPage')->name('update-page');

            Route::post('add-service', 'addService')->name('add-service');
            Route::get('delete-service/{id}', 'deleteService')->name('delete-service');

            Route::get('team-settings', 'teamSettings')->name('team-settings');
            Route::post('add-team-member', 'addTeamMember')->name('add-team-member');
        });
    });
});
