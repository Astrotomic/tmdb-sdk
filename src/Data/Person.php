<?php

declare(strict_types=1);

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
        public ?string $biography,
        public ?CarbonImmutable $birthday,
        public ?CarbonImmutable $deathday,
        public Gender $gender,
        public ?string $homepage,
        public int $id,
        public ?string $imdbId,
        public Department $knownForDepartment,
        public string $name,
        public ?string $placeOfBirth,
        public float $popularity,
        public ?string $profilePath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            adult: $data['adult'],
            alsoKnownAs: $data['also_known_as'] ?? [],
            biography: $data['biography'] ?? null,
            birthday: empty($data['birthday']) ? null : CarbonImmutable::parse($data['birthday']),
            deathday: empty($data['deathday']) ? null : CarbonImmutable::parse($data['deathday']),
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
