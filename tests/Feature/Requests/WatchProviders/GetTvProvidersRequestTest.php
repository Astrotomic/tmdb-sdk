<?php

use Astrotomic\Tmdb\Collections\WatchProviderCollection;
use Astrotomic\Tmdb\Data\WatchProvider;

it('responds with tv providers data', function (): void {
    $data = $this->tmdb->watchProviders()->getTvProviders();

    expect($data)
        ->toBeInstanceOf(WatchProviderCollection::class)
        ->each->toBeInstanceOf(WatchProvider::class);
})->group('watchProviders', 'getTvProviders');
