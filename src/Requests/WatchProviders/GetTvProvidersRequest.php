<?php

namespace Astrotomic\Tmdb\Requests\WatchProviders;

use Astrotomic\Tmdb\Data\Collections\WatchProviderCollection;
use Astrotomic\Tmdb\TMDB;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

/**
 * @link https://developers.themoviedb.org/3/watch-providers/get-tv-providers
 */
class GetTvProvidersRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = TMDB::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/watch/providers/tv';
    }

    protected function castToDto(SaloonResponse $response): WatchProviderCollection
    {
        return WatchProviderCollection::fromArray(
            $response->json('results')
        );
    }
}
