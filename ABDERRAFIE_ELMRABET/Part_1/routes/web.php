<?php

use App\Http\Controllers\HikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hikes', [HikeController::class, 'index'])->name('hikes.index');