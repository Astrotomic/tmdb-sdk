<?php

use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Data\Movie;

it('responds with movie details data', function (int $id): void {
    $data = $this->tmdb->movies()->getRecommendations($id);

    expect($data)
        ->toBeInstanceOf(MovieCollection::class)
        ->each->toBeInstanceOf(Movie::class);
})->group('movies', 'getRecommendations')->with('movie_ids');
