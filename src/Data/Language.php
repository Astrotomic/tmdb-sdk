<?php

namespace Astrotomic\Tmdb\Data;

class Language
{
    final public function __construct(
        public readonly string $iso639,
        public readonly string $name,
        public readonly string $englishName,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new static(
            iso639: $data['iso_639_1'],
            name: $data['name'],
            englishName: $data['english_name'],
        );
    }
}
