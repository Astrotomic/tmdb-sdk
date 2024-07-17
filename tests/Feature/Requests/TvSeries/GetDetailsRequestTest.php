<?php

use Astrotomic\Tmdb\Data\TvSeries;

it('responds with tv series details data', function (int $id): void {
    $data = $this->tmdb->tvSeries()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(TvSeries::class);
})->group('tvSeries', 'getDetails')->with('tv_series_ids');
