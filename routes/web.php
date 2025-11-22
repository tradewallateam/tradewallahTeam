<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('pages.home');
    Route::get('/about', 'about')->name('pages.about');
    Route::get('/services', 'services')->name('pages.services');
    Route::get('/contact', 'contact')->name('pages.contact');
});

require __DIR__ . '/admin.php';
