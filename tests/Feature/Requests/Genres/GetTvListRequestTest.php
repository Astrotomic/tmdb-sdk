<?php

use Astrotomic\Tmdb\Data\Collections\GenreCollection;
use Astrotomic\Tmdb\Data\Genre;

it('responds with list of tv genres data', function (): void {
    $data = $this->tmdb->genres()->getTvList();

    expect($data)
        ->toBeInstanceOf(GenreCollection::class)
        ->each->toBeInstanceOf(Genre::class);
})->group('genres', 'getTvList');
