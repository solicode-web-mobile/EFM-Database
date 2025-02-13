<?php

use App\Http\Controllers\RandonneeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisController;


Route::get('/', function () {
    return view('welcome');
});

