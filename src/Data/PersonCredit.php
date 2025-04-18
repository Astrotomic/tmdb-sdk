<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Enums\Department;
use Astrotomic\Tmdb\Enums\Gender;
use Astrotomic\Tmdb\Enums\Job;
use Astrotomic\Tmdb\Images\Poster;

readonly class PersonCredit
{
    final public function __construct(
        public ?bool $adult,
        public int $id,
        public ?Department $department,
        public ?Department $knownForDepartment,
        public string $creditId,
        public string $name,
        public string $originalName,
        public Gender $gender,
        public ?string $profilePath,
        public ?float $popularity,
        public ?int $castId,
        public ?string $character,
        public ?int $order,
        public ?Job $job,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            adult: $data['adult'] ?? null,
            id: $data['id'],
            department: empty($data['department']) ? null : Department::from($data['department']),
            knownForDepartment: empty($data['known_for_department']) ? null : Department::from($data['known_for_department']),
            creditId: $data['credit_id'],
            name: $data['name'],
            originalName: $data['original_name'],
            gender: Gender::from($data['gender']),
            profilePath: $data['profile_path'],
            popularity: $data['popularity'] ?? null,
            castId: $data['cast_id'] ?? null,
            character: $data['character'] ?? null,
            order: $data['order'] ?? null,
            job: empty($data['job']) ? null : Job::from($data['job']),
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
