<?php

namespace Astrotomic\Tmdb\Data;

readonly class Region
{
    final public function __construct(
        public string $iso3166,
        public string $name,
        public string $englishName,
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
