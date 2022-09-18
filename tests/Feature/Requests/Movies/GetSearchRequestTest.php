<?php

use Astrotomic\Tmdb\Data\Collections\MovieCollection;
use Astrotomic\Tmdb\Data\Movie;

it('responds with movie collection data', function (string $query): void {
    $data = $this->tmdb->movies()->search($query);

    expect($data)
        ->toBeInstanceOf(MovieCollection::class)
        ->each->toBeInstanceOf(Movie::class);
})->group('movies', 'search')->with([
    'Venom',
    'Black Hawk',
    'Minions',
    'Black Widow',
]);
