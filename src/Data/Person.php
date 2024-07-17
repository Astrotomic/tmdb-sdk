<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Enums\Department;
use Astrotomic\Tmdb\Enums\Gender;
use Astrotomic\Tmdb\Images\Poster;
use Carbon\CarbonImmutable;

readonly class Person
{
    /**
     * @param  array<array-key, string>  $alsoKnownAs
     */
    final public function __construct(
        public bool $adult,
        public array $alsoKnownAs,
        public string $biography,
        public CarbonImmutable $birthday,
        public ?CarbonImmutable $deathday,
        public Gender $gender,
        public ?string $homepage,
        public int $id,
        public ?string $imdbId,
        public Department $knownForDepartment,
        public string $name,
        public ?string $placeOfBirth,
        public string $popularity,
        public ?string $profilePath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            adult: $data['adult'],
            alsoKnownAs: $data['also_known_as'] ?? [],
            biography: $data['biography'],
            birthday: CarbonImmutable::parse($data['birthday']),
            deathday: $data['deathday'] ? CarbonImmutable::parse($data['deathday']) : null,
            gender: Gender::from($data['gender']),
            homepage: $data['homepage'] ?? null,
            id: $data['id'],
            imdbId: $data['imdb_id'] ?? null,
            knownForDepartment: Department::from($data['known_for_department']),
            name: $data['name'],
            placeOfBirth: $data['place_of_birth'] ?? null,
            popularity: $data['popularity'],
            profilePath: $data['profile_path'],
        );
    }

    public function profile(): Poster
    {
        return new Poster(
            $this->profilePath,
            $this->name
        );
    }
}
