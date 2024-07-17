<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\TvSeason;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, TvSeason>
 */
class TvSeasonCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, TvSeason>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): TvSeason => TvSeason::fromArray($item)
        );
    }
}
