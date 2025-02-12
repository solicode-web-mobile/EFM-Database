<?php

use App\Http\Controllers\StrategyController;
use App\Http\Controllers\AvieController;
use Illuminate\Support\Facades\Route;
use App\Models\Avie;
use App\Models\FeedbackType;

Route::get('/', [StrategyController::class, 'index']);
Route::get('edit/avie/{avie}', function(Avie $avie) {
	$avie->load('feedback.feedbackType');
	$feedbackTypes = FeedbackType::get();
    return view('avie.edit', compact(['avie', 'feedbackTypes']));
})->name('avie.edit');

Route::delete('delete/avie/{id}', [AvieController::class, 'destroy'])->name('avie.destroy');

