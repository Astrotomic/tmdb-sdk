<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class Title
{
    final public function __construct(
        public string $iso3166,
        public string $title,
        public ?string $type,
    ){}

    public static function fromArray(array $data): self
    {
        return new static(
            iso3166: $data['iso_3166_1'],
            title: $data['title'],
            type: $data['type'] ?? null,
        );
    }
}
