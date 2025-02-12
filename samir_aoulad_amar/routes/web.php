<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HikeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hikes', function () {
    return app(HikeController::class)->index();
})->name('hikes.index');

Auth::routes();
