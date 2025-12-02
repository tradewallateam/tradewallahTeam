<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MemberRegisterController;
use App\Http\Controllers\MainLogicController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['frontend.data'])->controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('pages.home');
    Route::get('/about', 'about')->name('pages.about');
    Route::get('/services', 'services')->name('pages.services');
    Route::get('/services/{id}', 'serviceDetails')->name('pages.service.details');
    Route::get('/contact', 'contact')->name('pages.contact');
    Route::get('/faq', 'faq')->name('pages.faq');
    Route::get('/risk-disclaimer', 'riskDisclaimer')->name('pages.risk');
    Route::get('/gallery', 'gallery')->name('pages.gallery');
    Route::get('/privacy-policy', 'privacyPolicy')->name('pages.privacy-policy');
    Route::get('/terms-and-conditions', 'termsConditions')->name('pages.terms-conditions');

    Route::middleware(['member.auth'])->group(function () {
        Route::get('/dashboard', 'dashboard')->name('pages.dashboard');
    });
});

Route::middleware(['frontend.data'])->controller(MainLogicController::class)->group(function () {
    Route::post('/submit-contact-form', 'submitContactForm')->name('contact.submit');
});

Route::controller(MemberRegisterController::class)->group(function () {
    Route::post('/register', 'register')->name('auth.register.submit');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('auth/login', 'memberLogin')->name('auth.login.submit');
    Route::get('auth/logout', 'memberLogout')->name('auth.logout');
});

require __DIR__ . '/admin.php';
