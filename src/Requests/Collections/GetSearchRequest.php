<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Collections;

use Astrotomic\Tmdb\Collections\CollectionCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/search-collection
 */
class GetSearchRequest extends Request implements Paginatable
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $search,
        public readonly bool $includeAdult = false,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search/collection';
    }

    protected function defaultQuery(): array
    {
        return [
            'query' => $this->search,
            'include_adult' => $this->includeAdult,
        ];
    }

    public function createDtoFromResponse(Response $response): CollectionCollection
    {
        return CollectionCollection::fromArray($response->json('results'));
    }
}
