<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\WatchProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, WatchProvider>
 */
class WatchProviderCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, WatchProvider>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => WatchProvider::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(WatchProvider::class);
    }
}
