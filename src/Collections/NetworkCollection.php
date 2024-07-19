<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Network;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @template TKey of int
 * @template TValue of Network
 *
 * @extends IlluminateCollection<TKey, TValue>
 */
class NetworkCollection extends IlluminateCollection
{
    /**
     * @param  array<TKey, array>  $data
     * @return self<TKey, TValue>
     */
    public static function fromArray(?array $data): self
    {
        return new static(array_map(
            fn (array $item) => Network::fromArray($item),
            $data ?? []
        ));
    }

    /**
     * @param  iterable<TKey, TValue>|null  $items
     */
    final public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Network::class);
    }
}
