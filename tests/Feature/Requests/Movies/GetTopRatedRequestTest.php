<?php

use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Data\Movie;

it('responds with movie collection data', function (): void {
    $data = $this->tmdb->movies()->getTopRated();

    expect($data)
        ->toBeInstanceOf(MovieCollection::class)
        ->each->toBeInstanceOf(Movie::class);
})->group('movies', 'getTopRated');
