<?php

use Astrotomic\Tmdb\Data\Collections\GenreCollection;
use Astrotomic\Tmdb\Data\Genre;

it('responds with list of movie genres data', function (): void {
    $data = $this->tmdb->genres()->getMovieList();

    expect($data)
        ->toBeInstanceOf(GenreCollection::class)
        ->each->toBeInstanceOf(Genre::class);
})->group('genres', 'getMovieList');
