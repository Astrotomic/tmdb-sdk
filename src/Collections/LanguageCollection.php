<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Language;
use Illuminate\Support\Collection;

/**
 * @extends Collection<array-key, Language>
 */
class LanguageCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Language>
     */
    public static function fromArray(array $data): self
    {
        return static::make($data)->map(
            fn (array $item): Language => Language::fromArray($item)
        );
    }
}
