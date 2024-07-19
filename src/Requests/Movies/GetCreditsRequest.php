<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Collections\PersonCreditCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

class GetCreditsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(
        public readonly int $id
    ) {}

    public function resolveEndpoint(): string
    {
        return "/movie/{$this->id}/credits";
    }

    /**
     * @todo add specific return DTO
     */
    public function createDtoFromResponse(Response $response): array
    {
        return [
            'id' => $response->json('id'),
            'cast' => PersonCreditCollection::fromArray($response->json('cast')),
            'crew' => PersonCreditCollection::fromArray($response->json('crew')),
        ];
    }
}
