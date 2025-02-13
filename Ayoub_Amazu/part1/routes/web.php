<?php

use App\Http\Controllers\StrategyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StrategyController::class, 'index']);
