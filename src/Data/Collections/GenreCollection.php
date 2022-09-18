<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Genre;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Genre
 */
class GenreCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Genre>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Genre => Genre::fromArray($item)
        );
    }
}
