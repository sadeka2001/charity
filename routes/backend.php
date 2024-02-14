<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ReasonController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CertifiedController;
use App\Http\Controllers\Backend\VolunteerController;
use App\Http\Controllers\Backend\RecentWorkController;


Route::get('/dashboard',[AdminController::class,'dashboard']);

//Slider Backend controller
Auth::routes();
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //group route
    Route::prefix('admin')->group(function () {
        Route::resource('slider', SliderController::class);
        Route::resource('about', AboutController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('event', EventController::class);
        Route::resource('cause', ReasonController::class);
        Route::resource('volunteer', VolunteerController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('contact', ContactController::class);
        Route::resource('certified', CertifiedController::class);
        Route::resource('recent_work', RecentWorkController::class);



        // Settings Generale Route
        Route::get('setting/general', [SettingController::class, 'general'])->name('general.index');
        Route::patch('setting/general/update', [SettingController::class, 'general_update'])->name('general.update');

        // Settings Appearance Route
        Route::get('setting/appearance', [SettingController::class, 'appearance'])->name('appearance.index');
        Route::patch('setting/appearance/update', [SettingController::class, 'appearance_update'])->name('appearance.update');

        // Settings Privacy Route
        Route::get('setting/privacy', [SettingController::class, 'privacy'])->name('privacy.index');
        Route::patch('setting/privacy/update', [SettingController::class, 'privacy_update'])->name('privacy.update');

        // Settings Term Route
        Route::get('setting/term', [SettingController::class, 'term'])->name('term.index');
        Route::patch('setting/term/update', [SettingController::class, 'term_update'])->name('term.update');

        // Settings Social Route
        Route::get('setting/social', [SettingController::class, 'social'])->name('social.index');
        Route::patch('setting/social/update', [SettingController::class, 'social_update'])->name('social.update');

    });
});
