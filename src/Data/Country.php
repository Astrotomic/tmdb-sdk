<?php

namespace Astrotomic\Tmdb\Data;

class Country
{
    final public function __construct(
        public readonly string $iso3166,
        public readonly string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            iso3166: $data['iso_3166_1'],
            name: $data['name'],
        );
    }
}
