<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Movie;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, Movie>
 */
class MovieCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Movie>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => Movie::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Movie::class);
    }
}
