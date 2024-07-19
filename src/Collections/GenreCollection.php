<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Genre;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, Genre>
 */
class GenreCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Genre>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => Genre::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Genre::class);
    }
}
