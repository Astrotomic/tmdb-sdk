<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Requests\TvSeries\GetDetailsRequest;
use Saloon\Http\BaseResource;

class TvSeries extends BaseResource
{
    public function getDetails(int $id): \Astrotomic\Tmdb\Data\TvSeries
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
