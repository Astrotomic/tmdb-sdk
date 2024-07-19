<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Collections;

use Astrotomic\Tmdb\Data\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/collection-details
 */
class GetDetailsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/collection/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return Collection::fromArray($response->json());
    }
}
