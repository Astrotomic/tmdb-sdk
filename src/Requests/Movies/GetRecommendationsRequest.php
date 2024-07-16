<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/movie-recommendations
 */
class GetRecommendationsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/movie/{$this->id}/recommendations";
    }

    public function createDtoFromResponse(Response $response): MovieCollection
    {
        return MovieCollection::fromArray($response->json('results'));
    }
}
