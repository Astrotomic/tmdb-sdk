<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Data\Credit;
use Astrotomic\Tmdb\Requests\Credits\GetDetailsRequest;
use Saloon\Http\BaseResource;

class Credits extends BaseResource
{
    public function getDetails(string $id): Credit
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }
}
