<?php

use App\Http\Controllers\ImageMotivationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupportMotivationController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/images', ImageMotivationController::class);


Route::delete('/images/{id}', SupportMotivationController::class, 'destroy')->name('images.destroy');

Route::get('/images/{id}/edit', SupportMotivationController::class, 'edit')->name('images.edit');


Route::put('/images/{id}', SupportMotivationController::class, 'update')->name('images.update');
