<?php

use App\Http\Controllers\RandonneeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisController;


Route::get('/', function () {
    return view('welcome');
});


// Route::get('/randonnees', [RandonneeController::class, 'index']);
Route::get('/randonnees', [RandonneeController::class, 'index'])->name('randonnees.index');




// Edit and Update Review
Route::get('avis/{avis}/edit', [AvisController::class, 'edit'])->name('avis.edit');
Route::put('avis/{avis}', [AvisController::class, 'update'])->name('avis.update');

// Delete Review
Route::delete('avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');
