<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function getRandomMovies()
    {
        $movies = $this->movieService->getRandomMovies();
        return response()->json($movies);
    }

    public function getEvenTitleMoviesStartingWithW()
    {
        $movies = $this->movieService->getEvenTitleMoviesStartingWithW();
        return response()->json($movies);
    }

    public function getMoviesWithMultipleWords()
    {
        $movies = $this->movieService->getMoviesWithMultipleWords();
        return response()->json($movies);
    }
}
