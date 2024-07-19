<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Data\Person;
use Astrotomic\Tmdb\Requests\People\GetDetailsRequest;
use Saloon\Http\BaseResource;

class People extends BaseResource
{
    public function getDetails(int $id): Person
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
