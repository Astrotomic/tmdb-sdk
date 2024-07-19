<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Paginators;

use Saloon\Http\Request;
use Saloon\Http\Response;

class PagedPaginator extends \Saloon\PaginationPlugin\PagedPaginator
{
    protected function isLastPage(Response $response): bool
    {
        return $response->json('page') === $response->json('total_pages');
    }

    protected function getPageItems(Response $response, Request $request): array
    {
        return $response->dto()->all();
    }
}
