<?php

namespace Astrotomic\Tmdb\Data;

readonly class Country
{
    final public function __construct(
        public string $iso3166,
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            iso3166: $data['iso_3166_1'],
            name: $data['name'],
        );
    }
}
