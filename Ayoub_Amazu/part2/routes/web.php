<?php

use App\Http\Controllers\StrategyController;
use App\Http\Controllers\AvieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StrategyController::class, 'index'])->name('index');
Route::get('edit/avie/{avie}', [AvieController::class, 'edit'])->name('avie.edit');
Route::put('/update/{avie}', [AvieController::class, 'update'])->name('avie.update');

Route::delete('delete/avie/{id}', [AvieController::class, 'destroy'])->name('avie.destroy');

