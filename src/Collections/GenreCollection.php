<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Genre;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Genre>
 */
class GenreCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Genre>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Genre => Genre::fromArray($item)
        );
    }
}
