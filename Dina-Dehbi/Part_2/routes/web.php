<?php

use App\Http\Controllers\HikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;


Route::get('/hikes', [HikeController::class, 'index']);

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');

Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');

Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');




use App\Http\Controllers\SuggestionController;

Route::get('suggestions/{id}/edit', [SuggestionController::class, 'edit'])->name('suggestions.edit');
Route::put('suggestions/{id}', [SuggestionController::class, 'update'])->name('suggestions.update');
