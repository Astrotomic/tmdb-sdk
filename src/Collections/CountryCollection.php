<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Country;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Country>
 */
class CountryCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Country>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Country => Country::fromArray($item)
        );
    }
}
