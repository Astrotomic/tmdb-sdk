<?php

namespace Astrotomic\Tmdb;

use Astrotomic\Tmdb\RequestCollections\Movies;
use Astrotomic\Tmdb\RequestCollections\WatchProviders;
use Astrotomic\Tmdb\Responses\TmdbResponse;
use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Sammyjo20\Saloon\Traits\Plugins\AlwaysThrowsOnErrors;

class TMDB extends SaloonConnector
{
    use AcceptsJson;
    use AlwaysThrowsOnErrors;

    protected ?string $response = TmdbResponse::class;

    public function __construct(
        protected string $token,
        protected ?string $language = null,
        protected ?string $region = null,
    ) {
    }

    public function defineBaseUrl(): string
    {
        return 'https://api.themoviedb.org/3';
    }

    public function defaultAuth(): ?AuthenticatorInterface
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

    public function movies(): Movies
    {
        return new Movies($this);
    }

    public function watchProviders(): WatchProviders
    {
        return new WatchProviders($this);
    }
}
