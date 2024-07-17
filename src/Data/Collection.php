<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Images\Backdrop;
use Astrotomic\Tmdb\Images\Poster;

readonly class Collection
{
    final public function __construct(
        public int $id,
        public string $name,
        public ?string $overview,
        public ?string $posterPath,
        public ?string $backdropPath,
        public MovieCollection $parts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'] ?? null,
            posterPath: $data['poster_path'] ?? null,
            backdropPath: $data['backdrop_path'] ?? null,
            parts: MovieCollection::fromArray($data['parts'] ?? null),
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
