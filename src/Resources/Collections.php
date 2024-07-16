<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Data\Collection;
use Astrotomic\Tmdb\Requests\Collections\GetDetailsRequest;
use Saloon\Http\BaseResource;

class Collections extends BaseResource
{
    public function getDetails(int $id): Collection
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
