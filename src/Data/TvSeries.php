<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\CompanyCollection;
use Astrotomic\Tmdb\Collections\CountryCollection;
use Astrotomic\Tmdb\Collections\GenreCollection;
use Astrotomic\Tmdb\Collections\LanguageCollection;
use Astrotomic\Tmdb\Collections\NetworkCollection;
use Astrotomic\Tmdb\Collections\PersonCreditCollection;
use Astrotomic\Tmdb\Collections\TvSeasonCollection;
use Astrotomic\Tmdb\Enums\TvSeriesStatus;
use Astrotomic\Tmdb\Enums\TvSeriesType;
use Astrotomic\Tmdb\Images\Backdrop;
use Astrotomic\Tmdb\Images\Poster;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;

readonly class TvSeries
{
    /**
     * @param  array<array-key, CarbonInterval>  $episodeRuntime
     * @param  array<array-key, string>  $originCountry
     * @param  array<array-key, string>  $languages
     */
    final public function __construct(
        public bool $adult,
        public ?string $backdropPath,
        public PersonCreditCollection $createdBy,
        public array $episodeRuntime,
        public ?CarbonImmutable $firstAirDate,
        public GenreCollection $genres,
        public ?string $homepage,
        public int $id,
        public bool $inProduction,
        public array $languages,
        public ?CarbonImmutable $lastAirDate,
        public ?TvEpisode $lastEpisodeToAir,
        public string $name,
        public ?TvEpisode $nextEpisodeToAir,
        public NetworkCollection $networks,
        public int $numberOfEpisodes,
        public int $numberOfSeasons,
        public array $originCountry,
        public string $originalLanguage,
        public string $originalName,
        public ?string $overview,
        public float $popularity,
        public ?string $posterPath,
        public CompanyCollection $productionCompanies,
        public CountryCollection $productionCountries,
        public TvSeasonCollection $seasons,
        public LanguageCollection $spokenLanguages,
        public ?TvSeriesStatus $status,
        public ?string $tagline,
        public ?TvSeriesType $type,
        public float $voteAverage,
        public int $voteCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            adult: $data['adult'],
            backdropPath: $data['backdrop_path'],
            createdBy: PersonCreditCollection::fromArray($data['created_by'] ?? null),
            episodeRuntime: array_map(fn (int $minutes) => CarbonInterval::minutes($minutes)->cascade(), $data['episode_run_time']),
            firstAirDate: empty($data['first_air_date']) ? null : CarbonImmutable::parse($data['first_air_date']),
            genres: GenreCollection::fromArray($data['genres'] ?? null),
            homepage: $data['homepage'] ?? null,
            id: $data['id'],
            inProduction: $data['in_production'],
            languages: $data['languages'],
            lastAirDate: empty($data['last_air_date']) ? null : CarbonImmutable::parse($data['last_air_date']),
            lastEpisodeToAir: empty($data['last_episode_to_air']) ? null : TvEpisode::fromArray($data['last_episode_to_air']),
            name: $data['name'],
            nextEpisodeToAir: empty($data['next_episode_to_air']) ? null : TvEpisode::fromArray($data['next_episode_to_air']),
            networks: NetworkCollection::fromArray($data['networks'] ?? null),
            numberOfEpisodes: $data['number_of_episodes'],
            numberOfSeasons: $data['number_of_seasons'],
            originCountry: $data['origin_country'],
            originalLanguage: $data['original_language'],
            originalName: $data['original_name'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            posterPath: $data['poster_path'],
            productionCompanies: CompanyCollection::fromArray($data['production_companies'] ?? null),
            productionCountries: CountryCollection::fromArray($data['production_countries'] ?? null),
            seasons: TvSeasonCollection::fromArray($data['seasons'] ?? null),
            spokenLanguages: LanguageCollection::fromArray($data['spoken_languages'] ?? null),
            status: empty($data['status']) ? null : TvSeriesStatus::from($data['status']),
            tagline: $data['tagline'] ?? null,
            type: empty($data['type']) ? null : TvSeriesType::from($data['type']),
            voteAverage: $data['vote_average'],
            voteCount: $data['vote_count'],
        );
    }

    public function poster(): Poster
    {
        return new Poster(
            $this->posterPath,
            $this->name
        );
    }

    public function backdrop(): Backdrop
    {
        return new Backdrop(
            $this->backdropPath,
            $this->name
        );
    }
}
