<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as TestingTestCase;

class MovieControllerTest extends TestingTestCase
{
    use RefreshDatabase;

    public function testGetRandomMovies()
    {
        $response1 = $this->get('/movies/random');
        $response1->assertStatus(200);
        $response1->assertJsonCount(3);

        $moviesSet1 = $response1->json();

        $response2 = $this->get('/movies/random');
        $response2->assertStatus(200);
        $response2->assertJsonCount(3);

        $moviesSet2 = $response2->json();

        $this->assertNotEquals($moviesSet1, $moviesSet2, 'The random movie selections should not be identical.');
    }

    public function testGetEvenTitleMoviesStartingWithW()
    {
        $response = $this->get('/movies/even-starting-with-w');
        $response->assertStatus(200);

        $movies = $response->json();

        foreach ($movies as $movie) {
            $name = $movie['name'];
            $this->assertTrue(str_starts_with(strtolower($name), 'w'), "The movie title '{$name}' does not start with 'W'.");
            $this->assertTrue(strlen($name) % 2 === 0, "The movie title '{$name}' does not have an even number of characters.");
        }
    }

    public function testGetMoviesWithMultipleWords()
    {
        $response = $this->get('/movies/multi-word');
        $response->assertStatus(200);

        $movies = $response->json();

        foreach ($movies as $movie) {
            $name = $movie['name'];
            $this->assertTrue(str_word_count($name) > 1, "The movie title '{$name}' does not consist of multiple words.");
        }
    }
}
