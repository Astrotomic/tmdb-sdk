<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Genre;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @template TKey of int
 * @template TValue of Genre
 *
 * @extends IlluminateCollection<TKey, TValue>
 */
class GenreCollection extends IlluminateCollection
{
    /**
     * @param  array<TKey, array>  $data
     * @return self<TKey, TValue>
     */
    public static function fromArray(?array $data): self
    {
        return new static(array_map(
            fn (array $item) => Genre::fromArray($item),
            $data ?? []
        ));
    }

    /**
     * @param  iterable<TKey, TValue>|null  $items
     */
    final public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Genre::class);
    }
}
