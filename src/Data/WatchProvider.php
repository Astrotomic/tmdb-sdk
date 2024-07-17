<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Images\Logo;

readonly class WatchProvider
{
    final public function __construct(
        public int $id,
        public string $name,
        public int $displayPriority,
        public string $logoPath,
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
