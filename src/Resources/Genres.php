<?php

namespace Astrotomic\Tmdb\Resources;

use Astrotomic\Tmdb\Collections\GenreCollection;
use Astrotomic\Tmdb\Requests\Genres\GetMovieListRequest;
use Astrotomic\Tmdb\Requests\Genres\GetTvListRequest;
use Saloon\Http\BaseResource;

class Genres extends BaseResource
{
    public function getMovieList(): GenreCollection
    {
        return $this->connector->send(
            new GetMovieListRequest()
        )->dto();
    }

    public function getTvList(): GenreCollection
    {
        return $this->connector->send(
            new GetTvListRequest()
        )->dto();
    }
}
