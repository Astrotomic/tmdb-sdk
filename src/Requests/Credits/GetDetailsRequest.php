<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Requests\Credits;

use Astrotomic\Tmdb\Data\Credit;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

class GetDetailsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $creditId
    ) {}

    public function resolveEndpoint(): string
    {
        return "/credit/{$this->creditId}";
    }

    public function createDtoFromResponse(Response $response): Credit
    {
        return Credit::fromArray($response->json());
    }
}
