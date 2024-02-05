<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('fronted.layout.master');
});
Route::get('/dashboard',[AdminController::class,'dashboard']);

//Slider Backend controller
Route:: resource('slider',SliderController::class);
