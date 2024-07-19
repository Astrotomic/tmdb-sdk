<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Images\Poster;
use Carbon\CarbonImmutable;

readonly class TvSeason
{
    final public function __construct(
        public ?CarbonImmutable $airDate,
        public int $episodeCount,
        public int $id,
        public string $name,
        public ?string $overview,
        public ?string $posterPath,
        public int $seasonNumber,
        public float $voteAverage,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            airDate: empty($data['air_date']) ? null : CarbonImmutable::parse($data['air_date']),
            episodeCount: $data['episode_count'],
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'],
            posterPath: $data['poster_path'],
            seasonNumber: $data['season_number'],
            voteAverage: $data['vote_average'],
        );
    }

    public function poster(): Poster
    {
        return new Poster(
            $this->posterPath,
            $this->name
        );
    }
}
