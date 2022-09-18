<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Region;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Region
 */
class RegionCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Region>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Region => Region::fromArray($item)
        );
    }
}
