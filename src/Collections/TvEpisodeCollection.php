<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\TvEpisode;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, TvEpisode>
 */
class TvEpisodeCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, TvEpisode>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => TvEpisode::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(TvEpisode::class);
    }
}
