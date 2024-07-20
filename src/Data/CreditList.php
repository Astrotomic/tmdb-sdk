<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

use Astrotomic\Tmdb\Collections\PersonCreditCollection;

readonly class CreditList
{
    final public function __construct(
        public int $id,
        public PersonCreditCollection $cast,
        public PersonCreditCollection $crew,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            cast: PersonCreditCollection::fromArray($data['cast']),
            crew: PersonCreditCollection::fromArray($data['crew']),
        );
    }
}
