<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\WatchProviderCollection;

readonly class CountryWatchProvider
{
    final public function __construct(
        public string $country,
        public string $link,
        public WatchProviderCollection $rent,
        public WatchProviderCollection $buy,
        public WatchProviderCollection $flatrate,
        public WatchProviderCollection $free,
    ) {}

    public static function fromArray(array $data, string $country): self
    {
        return new static(
            country: $country,
            link : $data['link'],
            rent: WatchProviderCollection::fromArray($data['rent'] ?? null),
            buy: WatchProviderCollection::fromArray($data['buy'] ?? null),
            flatrate: WatchProviderCollection::fromArray($data['flatrate'] ?? null),
            free: WatchProviderCollection::fromArray($data['free'] ?? null),
        );
    }
}
