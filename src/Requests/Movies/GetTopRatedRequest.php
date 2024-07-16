<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/movie-top-rated-list
 */
class GetTopRatedRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/movie/top_rated';
    }

    public function createDtoFromResponse(Response $response): MovieCollection
    {
        return MovieCollection::fromArray($response->json('results'));
    }
}
