<?php

use App\Http\Controllers\StrategiesController;
use Illuminate\Support\Facades\Route;


Route::get('/',[StrategiesController::class, 'index']);
