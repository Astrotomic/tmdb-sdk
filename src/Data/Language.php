<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class Language
{
    final public function __construct(
        public string $iso639,
        public string $name,
        public string $englishName,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            iso639: $data['iso_639_1'],
            name: $data['name'],
            englishName: $data['english_name'],
        );
    }
}
