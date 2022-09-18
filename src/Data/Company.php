<?php

namespace Astrotomic\Tmdb\Data;

class Company
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $originCountry,
        public readonly ?string $logoPath,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            originCountry: $data['origin_country'],
            logoPath: $data['logo_path'],
        );
    }
}
