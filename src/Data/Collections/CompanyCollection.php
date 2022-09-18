<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Company;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Company
 */
class CompanyCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Company>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Company => Company::fromArray($item)
        );
    }
}
