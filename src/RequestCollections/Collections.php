<?php

namespace Astrotomic\Tmdb\RequestCollections;

use Astrotomic\Tmdb\Data\Collection;
use Astrotomic\Tmdb\Requests\Collections\GetDetailsRequest;
use Sammyjo20\Saloon\Http\RequestCollection;

class Collections extends RequestCollection
{
    public function getDetails(int $id): Collection
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
