<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Credit;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, Credit>
 */
class CreditCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Credit>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => Credit::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Credit::class);
    }
}
