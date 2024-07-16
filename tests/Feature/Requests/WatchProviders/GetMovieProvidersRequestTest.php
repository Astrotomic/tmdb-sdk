<?php

use Astrotomic\Tmdb\Collections\WatchProviderCollection;
use Astrotomic\Tmdb\Data\WatchProvider;

it('responds with movie providers data', function (): void {
    $data = $this->tmdb->watchProviders()->getMovieProviders();

    expect($data)
        ->toBeInstanceOf(WatchProviderCollection::class)
        ->each->toBeInstanceOf(WatchProvider::class);
})->group('watchProviders', 'getMovieProviders');
