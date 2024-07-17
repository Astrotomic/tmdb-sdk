<?php

use Astrotomic\Tmdb\Data\Person;

it('responds with person details data', function (int $id): void {
    $data = $this->tmdb->people()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(Person::class);
})->group('people', 'getDetails')->with('person_ids');
