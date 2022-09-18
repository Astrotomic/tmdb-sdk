<?php

namespace Astrotomic\Tmdb\Requests\Genres;

use Astrotomic\Tmdb\Data\Collections\GenreCollection;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/genres/get-tv-list
 */
class GetTvListRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = TMDB::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/genre/tv/list';
    }

    protected function castToDto(SaloonResponse $response): GenreCollection
    {
        return GenreCollection::fromArray(
            $response->json('genres')
        );
    }
}
