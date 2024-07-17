<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Enums\TvEpisodeType;
use Astrotomic\Tmdb\Images\Backdrop;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;

readonly class TvEpisode
{
    final public function __construct(
        public int $id,
        public string $name,
        public ?string $overview,
        public float $voteAverage,
        public int $voteCount,
        public ?CarbonImmutable $airDate,
        public int $episodeNumber,
        public TvEpisodeType $episodeType,
        public string $productionCode,
        public ?CarbonInterval $runtime,
        public int $seasonNumber,
        public int $showId,
        public ?string $stillPath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'],
            voteAverage: $data['vote_average'],
            voteCount: $data['vote_count'],
            airDate: empty($data['air_date']) ? null : CarbonImmutable::parse($data['air_date']),
            episodeNumber: $data['episode_number'],
            episodeType: TvEpisodeType::from($data['episode_type']),
            productionCode: $data['production_code'],
            runtime: empty($data['runtime']) ? null : CarbonInterval::minutes($data['runtime'])->cascade(),
            seasonNumber: $data['season_number'],
            showId: $data['show_id'],
            stillPath: $data['still_path'],
        );
    }

    public function still(): Backdrop
    {
        return new Backdrop(
            $this->stillPath,
            $this->name
        );
    }
}
