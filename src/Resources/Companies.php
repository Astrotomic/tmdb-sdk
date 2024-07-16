<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Data\Company;
use Astrotomic\Tmdb\Requests\Companies\GetDetailsRequest;
use Saloon\Http\BaseResource;

class Companies extends BaseResource
{
    public function getDetails(int $id): Company
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
