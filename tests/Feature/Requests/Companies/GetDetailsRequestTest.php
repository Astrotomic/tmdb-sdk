<?php

use Astrotomic\Tmdb\Data\Company;

it('responds with company details data', function (int $id): void {
    $data = $this->tmdb->companies()->getDetails($id);

    expect($data)
        ->toBeInstanceOf(Company::class);
})->group('companies', 'getDetails')->with('company_ids');
