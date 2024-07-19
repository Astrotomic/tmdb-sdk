<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\CountryWatchProviderCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/movie-watch-providers
 */
class GetWatchProvidersRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/movie/{$this->id}/watch/providers";
    }

    public function createDtoFromResponse(Response $response): CountryWatchProviderCollection
    {
        return CountryWatchProviderCollection::fromArray($response->json('results'));
    }
}
