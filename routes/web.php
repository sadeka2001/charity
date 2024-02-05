<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CertifiedController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ReasonController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\VolunteerController;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//fronted
Route::get('/', function () {
    return view('fronted.home');
});


// backend
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

    });
});




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
