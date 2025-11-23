<?php

use App\Http\Controllers\MainLogicController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['frontend.data'])->controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('pages.home');
    Route::get('/about', 'about')->name('pages.about');
    Route::get('/services', 'services')->name('pages.services');
    Route::get('/contact', 'contact')->name('pages.contact');
});

Route::middleware(['frontend.data'])->controller(MainLogicController::class)->group(function () {
    Route::post('/submit-contact-form', 'submitContactForm')->name('contact.submit');
});

require __DIR__ . '/admin.php';
