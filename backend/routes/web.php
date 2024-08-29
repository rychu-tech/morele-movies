<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::controller(MovieController::class)->prefix('/movies')->group(function () {
    Route::get('/random', 'getRandomMovies');
    Route::get('/even-starting-with-w', 'getEvenTitleMoviesStartingWithW');
    Route::get('/multi-word', 'getMoviesWithMultipleWords');
});

