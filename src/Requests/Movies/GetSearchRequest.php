<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/search-movie
 */
class GetSearchRequest extends Request implements Paginatable
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(
        public string $search,
        public ?int $year = null
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search/movie';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->search,
            'year' => $this->year,
        ]);
    }

    public function createDtoFromResponse(Response $response): MovieCollection
    {
        return MovieCollection::fromArray($response->json('results'));
    }
}
