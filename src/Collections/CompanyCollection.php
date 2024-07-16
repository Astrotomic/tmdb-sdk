<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Company;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Company>
 */
class CompanyCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Company>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Company => Company::fromArray($item)
        );
    }
}
