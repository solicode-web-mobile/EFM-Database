<?php

use App\Http\Controllers\AvisController as AvisController;
use App\Http\Controllers\StrategyController;
use Illuminate\Support\Facades\Route;

// Route pour afficher la liste des stratégies et des avis
Route::get('/strategies', [StrategyController::class, 'index'])->name('strategies.index');

// Routes pour les avis
Route::get('/avis', [AvisController::class, 'index'])->name('avis_list');
Route::get('/avis/create', [AvisController::class, 'create'])->name('avis_create');
Route::post('/avis', [AvisController::class, 'store'])->name('avis_store');
Route::get('/avis/{id}/edit', [AvisController::class, 'edit'])->name('avis_edit');
Route::put('/avis/{id}', [AvisController::class, 'update'])->name('avis_update');
Route::delete('/avis/{id}', [AvisController::class, 'destroy'])->name('avis_delete');