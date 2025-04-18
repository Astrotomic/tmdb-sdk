<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class ExternalIds
{
    final public function __construct(
        public int $id,
        public ?string $imdbId,
        public ?string $wikidataId,
        public ?string $facebookId,
        public ?string $instagramId,
        public ?string $twitterId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'] ?? 0,
            imdbId: $data['imdb_id'] ?? null,
            wikidataId: $data['wikidata_id'] ?? null,
            facebookId: $data['facebook_id'] ?? null,
            instagramId: $data['instagram_id'] ?? null,
            twitterId: $data['twitter_id'] ?? null,
        );
    }
}
