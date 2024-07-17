<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Region;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Region>
 */
class RegionCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Region>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Region => Region::fromArray($item)
        );
    }
}
