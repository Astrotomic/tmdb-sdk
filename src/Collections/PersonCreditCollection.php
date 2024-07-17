<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\PersonCredit;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, PersonCredit>
 */
class PersonCreditCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, PersonCredit>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): PersonCredit => PersonCredit::fromArray($item)
        );
    }
}
