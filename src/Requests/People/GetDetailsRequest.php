<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\People;

use Astrotomic\Tmdb\Data\Person;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/person-details
 */
class GetDetailsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/person/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Person
    {
        return Person::fromArray($response->json());
    }
}
