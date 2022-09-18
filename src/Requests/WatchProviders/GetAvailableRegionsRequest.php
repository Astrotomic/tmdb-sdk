<?php

namespace Astrotomic\Tmdb\Requests\WatchProviders;

use Astrotomic\Tmdb\Data\Collections\RegionCollection;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/watch-providers/get-available-regions
 */
class GetAvailableRegionsRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = TMDB::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/watch/providers/regions';
    }

    protected function castToDto(SaloonResponse $response): RegionCollection
    {
        return RegionCollection::fromArray(
            $response->json('results')
        );
    }
}
