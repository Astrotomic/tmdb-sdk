<?php

namespace Astrotomic\Tmdb\Requests\Collections;

use Astrotomic\Tmdb\Data\Collection;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/collections/get-collection-details
 */
class GetDetailsRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = TMDB::class;

    protected ?string $method = Saloon::GET;

    public function __construct(public readonly int $id)
    {
    }

    public function defineEndpoint(): string
    {
        return "/collection/{$this->id}";
    }

    protected function castToDto(SaloonResponse $response): Collection
    {
        return Collection::fromArray($response->json());
    }
}
