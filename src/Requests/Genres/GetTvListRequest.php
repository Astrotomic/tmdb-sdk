<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Genres;

use Astrotomic\Tmdb\Collections\GenreCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/genre-tv-list
 */
class GetTvListRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/genre/tv/list';
    }

    public function createDtoFromResponse(Response $response): GenreCollection
    {
        return GenreCollection::fromArray($response->json('genres'));
    }
}
