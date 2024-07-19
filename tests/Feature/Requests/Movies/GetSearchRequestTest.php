<?php

use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Data\Movie;
use Astrotomic\Tmdb\Requests\Movies\GetSearchRequest;
use Illuminate\Support\LazyCollection;

it('responds with movie collection data', function (string $query): void {
    $data = $this->tmdb->movies()->getSearch($query);

    expect($data)
        ->toBeInstanceOf(MovieCollection::class)
        ->each->toBeInstanceOf(Movie::class);
})->group('movies', 'search')->with('movie_titles');

it('paginates movie search results', function (): void {
    $paginator = $this->tmdb->paginate(new GetSearchRequest('after', 2020));
    $items = $paginator->collect();

    expect($items)
        ->toBeInstanceOf(LazyCollection::class)
        ->toHaveCount(145)
        ->each->toBeInstanceOf(Movie::class);
})->group('movies', 'search');
