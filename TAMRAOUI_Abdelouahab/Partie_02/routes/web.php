<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
