<?php

use Astrotomic\Tmdb\Data\Credit;

it('responds with credit details data', function (string $id): void {
    $data = $this->tmdb->credits()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(Credit::class);
})->group('credits', 'getDetails')->with('credit_ids');
