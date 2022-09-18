<?php

use Astrotomic\Tmdb\Data\Collection;

it('responds with collection details data', function (int $id): void {
    $data = $this->tmdb->collections()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(Collection::class);
})->group('collections', 'getDetails')->with('collection_ids');
