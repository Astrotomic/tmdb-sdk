<?php

namespace Astrotomic\Tmdb\Requests\TvSeries;

use Astrotomic\Tmdb\Data\TvSeries;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/tv-series-details
 */
class GetDetailsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/tv/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): TvSeries
    {
        return TvSeries::fromArray($response->json());
    }
}
