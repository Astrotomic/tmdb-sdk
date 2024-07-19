<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\CountryWatchProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<string, CountryWatchProvider>
 */
class CountryWatchProviderCollection extends IlluminateCollection
{
    /**
     * @param  array<string, array>  $data
     * @return self<string, CountryWatchProvider>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item, string $country) => CountryWatchProvider::fromArray($item, $country)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(CountryWatchProvider::class);
    }
}
