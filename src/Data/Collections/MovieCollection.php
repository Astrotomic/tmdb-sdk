<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Movie;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Movie
 */
class MovieCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Movie>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Movie => Movie::fromArray($item)
        );
    }
}
