<?php

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Enums\Gender;
use Astrotomic\Tmdb\Images\Poster;

readonly class PersonCredit
{
    final public function __construct(
        public int $id,
        public string $creditId,
        public string $name,
        public string $originalName,
        public Gender $gender,
        public ?string $profilePath,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            creditId: $data['credit_id'],
            name: $data['name'],
            originalName: $data['original_name'],
            gender: Gender::from($data['gender']),
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
