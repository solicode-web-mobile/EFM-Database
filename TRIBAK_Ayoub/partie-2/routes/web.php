<?php

use App\Http\Controllers\ImageMotivationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/images', [ImageMotivationController::class, 'index']);
