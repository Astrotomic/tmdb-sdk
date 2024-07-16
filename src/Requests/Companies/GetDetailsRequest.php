<?php

namespace Astrotomic\Tmdb\Requests\Companies;

use Astrotomic\Tmdb\Data\Company;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\CreatesDtoFromResponse;

/**
 * @link https://developer.themoviedb.org/reference/company-details
 */
class GetDetailsRequest extends Request
{
    use CreatesDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/company/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Company
    {
        return Company::fromArray($response->json());
    }
}
