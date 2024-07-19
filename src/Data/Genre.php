<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class Genre
{
    final public function __construct(
        public int $id,
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
        );
    }
}
