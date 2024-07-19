<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\Company;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;

/**
 * @extends IlluminateCollection<array-key, Company>
 */
class CompanyCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Company>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: fn (array $item) => Company::fromArray($item)
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(Company::class);
    }
}
