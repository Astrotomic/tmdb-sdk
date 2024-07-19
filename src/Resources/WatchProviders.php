<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Collections\RegionCollection;
use Astrotomic\Tmdb\Collections\WatchProviderCollection;
use Astrotomic\Tmdb\Requests\WatchProviders\GetAvailableRegionsRequest;
use Astrotomic\Tmdb\Requests\WatchProviders\GetMovieProvidersRequest;
use Astrotomic\Tmdb\Requests\WatchProviders\GetTvProvidersRequest;
use Saloon\Http\BaseResource;

class WatchProviders extends BaseResource
{
    public function getAvailableRegions(): RegionCollection
    {
        return $this->connector->send(
            new GetAvailableRegionsRequest()
        )->dto();
    }

    public function getMovieProviders(): WatchProviderCollection
    {
        return $this->connector->send(
            new GetMovieProvidersRequest()
        )->dto();
    }

    public function getTvProviders(): WatchProviderCollection
    {
        return $this->connector->send(
            new GetTvProvidersRequest()
        )->dto();
    }
}
