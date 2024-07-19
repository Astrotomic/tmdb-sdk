<?php

use Astrotomic\Tmdb\Data\PersonCredit;

it('responds with movie credits data', function (int $id): void {
    $data = $this->tmdb->movies()->getCredits($id);

    expect($data)
        ->id->toBeInt()
        ->cast->each->toBeInstanceOf(PersonCredit::class)
        ->crew->each->toBeInstanceOf(PersonCredit::class);
})->group('movies', 'getCredits')->with('movie_ids');
