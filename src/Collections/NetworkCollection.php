<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Network;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Network>
 */
class NetworkCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Network>
     */
    public static function fromArray(?array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Network => Network::fromArray($item)
        );
    }
}
