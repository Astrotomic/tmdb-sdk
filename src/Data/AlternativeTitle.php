<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Data;

readonly class AlternativeTitle
{
    final public function __construct(
        public int   $id,
        public array $titles,
    ){}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'] ?? 0,
            titles: array_map(
                fn(array $title): Title => Title::fromArray($title),
                $data['titles'] ?? []
            ),
        );
    }
}
