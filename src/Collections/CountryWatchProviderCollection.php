<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\CountryWatchProvider;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @template TKey of int
 * @template TValue of CountryWatchProvider
 *
 * @extends IlluminateCollection<TKey, TValue>
 */
class CountryWatchProviderCollection extends IlluminateCollection
{
    /**
     * @param  array<string, array>  $data
     * @return self<TKey, TValue>
     */
    public static function fromArray(?array $data): self
    {
        return new static(array_map(
            fn (array $item, string $key) => CountryWatchProvider::fromArray($item, $key),
            $data ?? [],
            array_keys($data ?? [])
        ));
    }

    /**
     * @param  iterable<TKey, TValue>|null  $items
     */
    final public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(CountryWatchProvider::class);
    }
}
