<?php

namespace Astrotomic\Tmdb\Data;

class Genre
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
        );
    }
}
