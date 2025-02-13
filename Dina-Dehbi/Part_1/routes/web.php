<?php

use App\Http\Controllers\HikeController;
use Illuminate\Support\Facades\Route;


Route::get('/hike', [HikeController::class, 'index']);





