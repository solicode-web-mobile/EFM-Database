<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrategyController;


Route::get('/',[StrategyController::class , 'index']);