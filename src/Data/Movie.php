<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\CompanyCollection;
use Astrotomic\Tmdb\Collections\CountryCollection;
use Astrotomic\Tmdb\Collections\GenreCollection;
use Astrotomic\Tmdb\Collections\LanguageCollection;
use Astrotomic\Tmdb\Enums\MovieStatus;
use Astrotomic\Tmdb\Images\Backdrop;
use Astrotomic\Tmdb\Images\Poster;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;

class Movie
{
    final public function __construct(
        public readonly bool $adult,
        public readonly ?string $backdropPath,
        public readonly ?Collection $collection,
        public readonly ?int $budget,
        public readonly ?GenreCollection $genres,
        public readonly ?string $homepage,
        public readonly int $id,
        public readonly ?string $imdbId,
        public readonly string $originalLanguage,
        public readonly string $originalTitle,
        public readonly ?string $overview,
        public readonly float $popularity,
        public readonly ?string $posterPath,
        public readonly ?CompanyCollection $productionCompanies,
        public readonly ?CountryCollection $productionCountries,
        public readonly ?CarbonImmutable $releaseDate,
        public readonly ?int $revenue,
        public readonly ?CarbonInterval $runtime,
        public readonly ?LanguageCollection $spokenLanguages,
        public readonly ?MovieStatus $status,
        public readonly ?string $tagline,
        public readonly string $title,
        public readonly bool $video,
        public readonly float $voteAverage,
        public readonly int $voteCount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            adult: $data['adult'],
            backdropPath: $data['backdrop_path'],
            collection: empty($data['belongs_to_collection']) ? null : Collection::fromArray($data['belongs_to_collection']),
            budget: $data['budget'] ?? null,
            genres: empty($data['genres']) ? null : GenreCollection::fromArray($data['genres']),
            homepage: $data['homepage'] ?? null,
            id: $data['id'],
            imdbId: $data['imdb_id'] ?? null,
            originalLanguage: $data['original_language'],
            originalTitle: $data['original_title'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            posterPath: $data['poster_path'],
            productionCompanies: empty($data['production_companies']) ? null : CompanyCollection::fromArray($data['production_companies']),
            productionCountries: empty($data['production_countries']) ? null : CountryCollection::fromArray($data['production_countries']),
            releaseDate: empty($data['release_date']) ? null : CarbonImmutable::parse($data['release_date']),
            revenue: $data['revenue'] ?? null,
            runtime: empty($data['runtime']) ? null : CarbonInterval::minutes($data['runtime'])->cascade(),
            spokenLanguages: empty($data['spoken_languages']) ? null : LanguageCollection::fromArray($data['spoken_languages']),
            status: empty($data['status']) ? null : MovieStatus::from($data['status']),
            tagline: $data['tagline'] ?? null,
            title: $data['title'],
            video: $data['video'],
            voteAverage: $data['vote_average'],
            voteCount: $data['vote_count'],
        );
    }

    public function poster(): Poster
    {
        return new Poster(
            $this->posterPath,
            $this->title
        );
    }

    public function backdrop(): Backdrop
    {
        return new Backdrop(
            $this->backdropPath,
            $this->title
        );
    }
}
