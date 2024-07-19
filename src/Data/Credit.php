<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Enums\CreditType;
use Astrotomic\Tmdb\Enums\Department;
use Astrotomic\Tmdb\Enums\Job;
use Astrotomic\Tmdb\Enums\MediaType;

readonly class Credit
{
    final public function __construct(
        public CreditType $creditType,
        public Department $department,
        public Job $job,
        public array $media, // ToDo
        public MediaType $mediaType,
        public string $id,
        public Person $person,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            creditType: CreditType::from($data['credit_type']),
            department: Department::from($data['department']),
            job: Job::from($data['job']),
            media: $data['media'],
            mediaType: MediaType::from($data['media_type']),
            id: $data['id'],
            person: Person::fromArray($data['person']),
        );
    }
}
