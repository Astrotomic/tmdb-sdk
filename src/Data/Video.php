<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class Video
{
    final public function __construct(
        public string $iso639,
        public string $iso3166,
        public string $name,
        public string $key,
        public string $site,
        public int $size,
        public string $type,
        public bool $official,
        public string $publishedAt,
        public string $id,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            iso639: $data['iso_639_1'],
            iso3166: $data['iso_3166_1'],
            name: $data['name'],
            key: $data['key'],
            site: $data['site'],
            size: $data['size'],
            type: $data['type'],
            official: $data['official'],
            publishedAt: $data['published_at'],
            id: $data['id'],
        );
    }
}
