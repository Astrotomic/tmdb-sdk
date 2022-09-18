<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Country;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Country
 */
class CountryCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Country>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Country => Country::fromArray($item)
        );
    }
}
