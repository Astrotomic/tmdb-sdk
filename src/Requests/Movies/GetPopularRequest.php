<?php

namespace Astrotomic\Tmdb\Requests\Movies;

use Astrotomic\Tmdb\Data\Collections\MovieCollection;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/movies/get-popular-movies
 */
class GetPopularRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = TMDB::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/movie/popular';
    }

    protected function castToDto(SaloonResponse $response): MovieCollection
    {
        return MovieCollection::fromArray(
            $response->json('results')
        );
    }
}
