<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Language;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @template TKey of int
 * @template TValue of Language
 *
 * @extends IlluminateCollection<TKey, TValue>
 */
class LanguageCollection extends IlluminateCollection
{
    /**
     * @param  array<TKey, array>  $data
     * @return self<TKey, TValue>
     */
    public static function fromArray(?array $data): self
    {
        return new static(array_map(
            fn (array $item) => Language::fromArray($item),
            $data ?? []
        ));
    }

    /**
     * @param  iterable<TKey, TValue>|null  $items
     */
    final public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Language::class);
    }
}
