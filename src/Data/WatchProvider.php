<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Images\Logo;

readonly class WatchProvider
{
    final public function __construct(
        public int $providerId,
        public string $providerName,
        public int $displayPriority,
        public string $logoPath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            providerId: $data['provider_id'],
            providerName: $data['provider_name'],
            displayPriority: $data['display_priority'],
            logoPath: $data['logo_path'],
        );
    }

    public function logo(): Logo
    {
        return new Logo(
            $this->logoPath,
            $this->providerName
        );
    }
}
