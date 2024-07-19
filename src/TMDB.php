<?php

namespace Astrotomic\Tmdb;

use Astrotomic\Tmdb\Paginators\PagedPaginator;
use Astrotomic\Tmdb\Resources\Collections;
use Astrotomic\Tmdb\Resources\Companies;
use Astrotomic\Tmdb\Resources\Credits;
use Astrotomic\Tmdb\Resources\Genres;
use Astrotomic\Tmdb\Resources\Movies;
use Astrotomic\Tmdb\Resources\People;
use Astrotomic\Tmdb\Resources\TvSeries;
use Astrotomic\Tmdb\Resources\WatchProviders;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class TMDB extends Connector implements HasPagination
{
    use AcceptsJson;
    use AlwaysThrowOnErrors;

    public function __construct(
        protected string $token,
        protected ?string $language = null,
        protected ?string $region = null,
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.themoviedb.org/3';
    }

    public function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator($this->token);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'language' => $this->language,
            'region' => $this->region,
        ]);
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public function collections(): Collections
    {
        return new Collections($this);
    }

    public function companies(): Companies
    {
        return new Companies($this);
    }

    public function genres(): Genres
    {
        return new Genres($this);
    }

    public function movies(): Movies
    {
        return new Movies($this);
    }

    public function watchProviders(): WatchProviders
    {
        return new WatchProviders($this);
    }

    public function tvSeries(): TvSeries
    {
        return new TvSeries($this);
    }

    public function people(): People
    {
        return new People($this);
    }

    public function credits(): Credits
    {
        return new Credits($this);
    }

    public function paginate(Request $request): PagedPaginator
    {
        return new PagedPaginator($this, $request);
    }
}
