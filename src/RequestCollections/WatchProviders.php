<?php

namespace Astrotomic\Tmdb\RequestCollections;

use Astrotomic\Tmdb\Data\Collections\RegionCollection;
use Astrotomic\Tmdb\Data\Collections\WatchProviderCollection;
use Astrotomic\Tmdb\Requests\WatchProviders\GetAvailableRegionsRequest;
use Astrotomic\Tmdb\Requests\WatchProviders\GetMovieProvidersRequest;
use Astrotomic\Tmdb\Requests\WatchProviders\GetTvProvidersRequest;
use Sammyjo20\Saloon\Http\RequestCollection;

class WatchProviders extends RequestCollection
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
