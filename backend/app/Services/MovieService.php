<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getRandomMovies(int $count = 3)
    {
        return $this->movieRepository->getRandomMovies($count);
    }

    public function getEvenTitleMoviesStartingWithW()
    {
        return $this->movieRepository->getEvenTitleMoviesStartingWithW();
    }

    public function getMoviesWithMultipleWords()
    {
        return $this->movieRepository->getMoviesWithMultipleWords();
    }
}
