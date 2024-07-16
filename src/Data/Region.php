<?php

namespace Astrotomic\Tmdb\Data;

class Region
{
    final public function __construct(
        public readonly string $iso3166,
        public readonly string $name,
        public readonly string $englishName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            iso3166: $data['iso_3166_1'],
            name: $data['native_name'],
            englishName: $data['english_name'],
        );
    }
}
