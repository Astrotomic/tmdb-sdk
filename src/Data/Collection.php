<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\MovieCollection;
use Astrotomic\Tmdb\Images\Backdrop;
use Astrotomic\Tmdb\Images\Poster;

class Collection
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $overview,
        public readonly ?string $posterPath,
        public readonly ?string $backdropPath,
        public readonly ?MovieCollection $parts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'] ?? null,
            posterPath: $data['poster_path'] ?? null,
            backdropPath: $data['backdrop_path'] ?? null,
            parts: isset($data['parts']) ? MovieCollection::fromArray($data['parts']) : null,
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
