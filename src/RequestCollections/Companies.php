<?php

namespace Astrotomic\Tmdb\RequestCollections;

use Astrotomic\Tmdb\Data\Company;
use Astrotomic\Tmdb\Requests\Companies\GetDetailsRequest;
use Sammyjo20\Saloon\Http\RequestCollection;

class Companies extends RequestCollection
{
    public function getDetails(int $id): Company
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
