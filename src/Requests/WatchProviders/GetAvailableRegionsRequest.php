<?php

namespace Astrotomic\Tmdb\Requests\WatchProviders;

use Astrotomic\Tmdb\Collections\RegionCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/watch-providers-available-regions
 */
class GetAvailableRegionsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/watch/providers/regions';
    }

    public function createDtoFromResponse(Response $response): RegionCollection
    {
        return RegionCollection::fromArray($response->json('results'));
    }
}
