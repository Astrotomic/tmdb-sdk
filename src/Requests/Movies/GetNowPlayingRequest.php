<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/movie-now-playing-list
 */
class GetNowPlayingRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/movie/now_playing';
    }

    public function createDtoFromResponse(Response $response): MovieCollection
    {
        return MovieCollection::fromArray($response->json('results'));
    }
}
