<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Region;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, Region>
 */
class RegionCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Region>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => Region::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Region::class);
    }
}
