<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository
{
    public function getRandomMovies(int $count)
    {
        return Movie::inRandomOrder()->take($count)->get();
    }

    public function getEvenTitleMoviesStartingWithW()
    {
        return Movie::where('name', 'like', 'W%')
            ->whereRaw('CHAR_LENGTH(name) % 2 = 0')
            ->get();
    }

    public function getMoviesWithMultipleWords()
    {
        return Movie::whereRaw('LENGTH(name) - LENGTH(REPLACE(name, " ", "")) > 0')->get();
    }
}
