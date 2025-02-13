<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandonneeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/randonnees', [RandonneeController::class, 'index']);
