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
        Route::get('profile', 'profileSettings')->name('profile');
        Route::put('profile-update', 'profileUpdate')->name('profile.update');
        Route::get('logout/{id}', 'logout')->name('logout');
    });

    Route::controller(MemberController::class)->group(function () {
        Route::get('members', 'index')->name('members');
        Route::get('member-status-change/{member_id}', 'memberStatusChange')->name('members.change-status');
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

            Route::get('manage-page', 'managePage')->name('manage-page');
            Route::post('update-page', 'updateAboutPage')->name('update-page');

            Route::post('add-service', 'addService')->name('add-service');
            Route::get('delete-service/{id}', 'deleteService')->name('delete-service');
            Route::get('view-service/{id}', 'viewService')->name('view-service');
            Route::get('service-status-change/{id}', 'serviceChangeStatus')->name('service-status-change');
            Route::post('update-servie-details/{id}', 'updateServiceDetails')->name('update-service-details');

            Route::get('team-settings', 'teamSettings')->name('team-settings');
            Route::post('add-team-member', 'addTeamMember')->name('add-team-member');
            Route::get('delete-team-member/{id}', 'deleteTeamMember')->name('delete-team-member');
            Route::get('team-member-status-change/{id}', 'teamMemberStatusChange')->name('team-member-status');

            Route::get('general-site-setting', 'generalSiteSetting')->name('general-site-setting');
            Route::post('general-about-setting', 'generalAboutSetting')->name('general-about-setting');
            Route::post('genetal-service-setting', 'generalServiceSetting')->name('general-service-setting');
            Route::post('general-team-setting', 'generalTeamSetting')->name('general-team-setting');
            Route::post('general-pricing-setting', 'generalPricingSetting')->name('general-pricing-setting');
            Route::post('general-risk-disclaimer-setting', 'generalRiskDisclaimerSetting')->name('general-risk-disclaimer-setting');
            Route::post('general-contact-setting', 'generalContactSetting')->name('general-contact-setting');
            Route::post('general-testimonial-setting', 'generalTestimonialSetting')->name('general-testimonial-setting');

            Route::post('contact-setting', 'contactSetting')->name('contact-setting');
            // GAllery Setting       
            Route::get('gallery-setting', 'gallerySetting')->name('gallery-setting');
            Route::post('add-gallery-folder', 'addGallerFolder')->name('add-galler-folder');
            Route::patch('change-gallery-folder-status/{id}', 'changeGalleryFolderStatus')->name('change-gallery-folder-status');
            Route::get('gallery-folder-delete/{id}', 'gellaryFolderDelete')->name('gallery-folder-delete');
            Route::get('gallery/{folder_name}/{id}', 'viewGallerFolder')->name('view-gallery-folder');
            Route::post('upload-galler-images/{folder_id}', 'updateGalleryImages')->name('upload-galley-images');
            Route::get('gallery-image-delete/{image_id}', 'galleryImageDelete')->name('gallery-image-delete');
            Route::get('gallery-image-change-status/{image_id}', 'galleryImageChangeStatus')->name('gallery-image-change-status');

            Route::get('client-testimonials', 'clientTestimonials')->name('client-testimonials');
            Route::post('add-client-testimonial', 'addTestimonial')->name('add-client-testimonial');
            Route::get('client-testimonial-status-change/{id}', 'clientTestimonialStatusChange')->name('client-testimonial-status-change');
            Route::get('client-testimonial-delete/{id}', 'deleteClientTestimonial')->name('delete-client-testimonial');

            // Paid Links

            Route::get('paid-link', 'paidLinks')->name('paid-links');
            Route::post('add-paid-link', 'addPaidLink')->name('add-paid-link');
            Route::get('paid-link-change-status/{id}', 'paidLinkChangeStatus')->name('paid-link-change-status');
            Route::get('paid-link-delete/{id}', 'paidLinkDelete')->name('paid-link-delete');
        });
    });
});
