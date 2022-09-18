<?php

use Astrotomic\Tmdb\Data\Collections\RegionCollection;
use Astrotomic\Tmdb\Data\Region;

it('responds with available regions data', function (): void {
    $data = $this->tmdb->watchProviders()->getAvailableRegions();

    expect($data)
        ->toBeInstanceOf(RegionCollection::class)
        ->each->toBeInstanceOf(Region::class);
})->group('watchProviders', 'getAvailableRegions');
