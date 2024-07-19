<?php

use Astrotomic\Tmdb\Collections\CountryWatchProviderCollection;
use Astrotomic\Tmdb\Data\CountryWatchProvider;

it('responds with movie watch providers data', function (int $id): void {
    $data = $this->tmdb->movies()->getWatchProviders($id);

    expect($data)
        ->toBeInstanceOf(CountryWatchProviderCollection::class)
        ->each->toBeInstanceOf(CountryWatchProvider::class);
})->group('movies', 'getWatchProviders')->with('movie_ids');
