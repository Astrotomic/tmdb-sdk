<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\WatchProvider;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\WatchProvider
 */
class WatchProviderCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\WatchProvider>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): WatchProvider => WatchProvider::fromArray($item)
        );
    }
}
