<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageMotivationController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/images' , ImageMotivationController::class , 'index')->name('images.index');
