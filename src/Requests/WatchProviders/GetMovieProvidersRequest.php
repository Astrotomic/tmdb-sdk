<?php

namespace Astrotomic\Tmdb\Requests\WatchProviders;

use Astrotomic\Tmdb\Collections\WatchProviderCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/watch-providers-movie-list
 */
class GetMovieProvidersRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/watch/providers/movie';
    }

    public function createDtoFromResponse(Response $response): WatchProviderCollection
    {
        return WatchProviderCollection::fromArray($response->json('results'));
    }
}
