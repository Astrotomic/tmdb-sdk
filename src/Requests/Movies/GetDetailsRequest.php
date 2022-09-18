<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Data\Movie;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/movies/get-movie-details
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
        return "/movie/{$this->id}";
    }

    protected function castToDto(SaloonResponse $response): Movie
    {
        return Movie::fromArray($response->json());
    }
}
