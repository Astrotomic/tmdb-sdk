<?php

namespace Astrotomic\Tmdb\RequestCollections;

use Astrotomic\Tmdb\Data\Collections\GenreCollection;
use Astrotomic\Tmdb\Requests\Genres\GetMovieListRequest;
use Astrotomic\Tmdb\Requests\Genres\GetTvListRequest;
use Sammyjo20\Saloon\Http\RequestCollection;

class Genres extends RequestCollection
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
