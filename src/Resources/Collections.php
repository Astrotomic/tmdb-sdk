<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Collections\CollectionCollection;
use Astrotomic\Tmdb\Data\Collection;
use Astrotomic\Tmdb\Requests\Collections\GetDetailsRequest;
use Astrotomic\Tmdb\Requests\Collections\GetSearchRequest;
use Saloon\Http\BaseResource;

class Collections extends BaseResource
{
    public function getDetails(int $id): Collection
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }

    public function getSearch(string $query, bool $includeAdult = false): CollectionCollection
    {
        return $this->connector->send(
            new GetSearchRequest($query, $includeAdult)
        )->dto();
    }
}
