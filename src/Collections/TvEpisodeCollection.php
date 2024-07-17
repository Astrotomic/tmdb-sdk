<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\TvEpisode;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, TvEpisode>
 */
class TvEpisodeCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, TvEpisode>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): TvEpisode => TvEpisode::fromArray($item)
        );
    }
}
