<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\WatchProvider;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, WatchProvider>
 */
class WatchProviderCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, WatchProvider>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): WatchProvider => WatchProvider::fromArray($item)
        );
    }
}
