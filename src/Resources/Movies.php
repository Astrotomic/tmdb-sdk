<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Collections\CountryWatchProviderCollection;
use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Data\Movie;
use Astrotomic\Tmdb\Requests\Movies\GetCreditsRequest;
use Astrotomic\Tmdb\Requests\Movies\GetDetailsRequest;
use Astrotomic\Tmdb\Requests\Movies\GetNowPlayingRequest;
use Astrotomic\Tmdb\Requests\Movies\GetPopularRequest;
use Astrotomic\Tmdb\Requests\Movies\GetRecommendationsRequest;
use Astrotomic\Tmdb\Requests\Movies\GetSearchRequest;
use Astrotomic\Tmdb\Requests\Movies\GetSimilarRequest;
use Astrotomic\Tmdb\Requests\Movies\GetTopRatedRequest;
use Astrotomic\Tmdb\Requests\Movies\GetUpcomingRequest;
use Astrotomic\Tmdb\Requests\Movies\GetWatchProvidersRequest;
use Saloon\Http\BaseResource;

class Movies extends BaseResource
{
    public function getDetails(int $id): Movie
    {
        return $this->connector->send(
            new GetDetailsRequest($id)
        )->dto();
    }

    public function getSimilar(int $id): MovieCollection
    {
        return $this->connector->send(
            new GetSimilarRequest($id)
        )->dto();
    }

    public function getRecommendations(int $id): MovieCollection
    {
        return $this->connector->send(
            new GetRecommendationsRequest($id)
        )->dto();
    }

    public function getNowPlaying(): MovieCollection
    {
        return $this->connector->send(
            new GetNowPlayingRequest()
        )->dto();
    }

    public function getPopular(): MovieCollection
    {
        return $this->connector->send(
            new GetPopularRequest()
        )->dto();
    }

    public function getTopRated(): MovieCollection
    {
        return $this->connector->send(
            new GetTopRatedRequest()
        )->dto();
    }

    public function getUpcoming(): MovieCollection
    {
        return $this->connector->send(
            new GetUpcomingRequest()
        )->dto();
    }

    public function getSearch(string $query, ?int $year = null): MovieCollection
    {
        return $this->connector->send(
            new GetSearchRequest($query, $year)
        )->dto();
    }

    /**
     * @todo add return type
     */
    public function getCredits(int $id)
    {
        return $this->connector->send(
            new GetCreditsRequest($id)
        )->dto();
    }

    public function getWatchProviders(int $id): CountryWatchProviderCollection
    {
        return $this->connector->send(
            new GetWatchProvidersRequest($id)
        )->dto();
    }
}
