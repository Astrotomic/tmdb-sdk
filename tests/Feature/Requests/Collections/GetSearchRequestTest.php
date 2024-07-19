<?php

use Astrotomic\Tmdb\Collections\CollectionCollection;
use Astrotomic\Tmdb\Data\Collection;
use Astrotomic\Tmdb\Requests\Collections\GetSearchRequest;
use Illuminate\Support\LazyCollection;

it('responds with collections', function (string $query): void {
    $data = $this->tmdb->collections()->getSearch($query);

    expect($data)
        ->toBeInstanceOf(CollectionCollection::class)
        ->each->toBeInstanceOf(Collection::class);
})->group('collections', 'search')->with('collection_titles');

it('paginates movie search results', function (): void {
    $items = $this->tmdb->paginate(new GetSearchRequest('america'))->collect();

    expect($items)
        ->toBeInstanceOf(LazyCollection::class)
        ->toHaveCount(35)
        ->each->toBeInstanceOf(Collection::class);
})->group('collections', 'search');
