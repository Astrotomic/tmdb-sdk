<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Images\Logo;

readonly class Network
{
    final public function __construct(
        public int $id,
        public ?string $logoPath,
        public string $name,
        public string $originCountry,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            logoPath: $data['logo_path'],
            name: $data['name'],
            originCountry: $data['origin_country'],
        );
    }

    public function logo(): Logo
    {
        return new Logo(
            $this->logoPath,
            $this->name
        );
    }
}
