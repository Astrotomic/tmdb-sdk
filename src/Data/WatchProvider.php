<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Images\Logo;

class WatchProvider
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $displayPriority,
        public readonly string $logoPath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['provider_id'],
            name: $data['provider_name'],
            displayPriority: $data['display_priority'],
            logoPath: $data['logo_path'],
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
