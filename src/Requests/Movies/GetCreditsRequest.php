<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Data\CreditList;
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

    public function createDtoFromResponse(Response $response): CreditList
    {
        return CreditList::fromArray($response->json());
    }
}
