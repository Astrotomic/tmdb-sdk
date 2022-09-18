<?php

namespace Astrotomic\Tmdb\Data\Collections;

use Astrotomic\Tmdb\Data\Language;
use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TValue of \Astrotomic\Tmdb\Data\Language
 */
class LanguageCollection extends Collection
{
    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, \Astrotomic\Tmdb\Data\Language>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Language => Language::fromArray($item)
        );
    }
}
