<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Movie;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Movie>
 */
class MovieCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Movie>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Movie => Movie::fromArray($item)
        );
    }
}
