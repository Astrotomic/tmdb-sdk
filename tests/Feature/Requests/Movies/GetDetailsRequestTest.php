<?php

use Astrotomic\Tmdb\Data\Movie;

it('responds with movie details data', function (int $id): void {
    $data = $this->tmdb->movies()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(Movie::class);
})->group('movies', 'getDetails')->with('movie_ids');
