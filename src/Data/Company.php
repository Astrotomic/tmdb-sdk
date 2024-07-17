<?php

namespace Astrotomic\Tmdb\Data;

readonly class Company
{
    final public function __construct(
        public int $id,
        public string $name,
        public ?string $originCountry,
        public ?string $logoPath,
        public ?string $description,
        public ?string $headquarters,
        public ?string $homepage,
        public ?self $parentCompany,
    ) {}

    public static function fromArray(array $data): self
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            originCountry: $data['origin_country'],
            logoPath: $data['logo_path'],
            description: $data['description'] ?? null,
            headquarters: $data['headquarters'] ?? null,
            homepage: $data['homepage'] ?? null,
            parentCompany: empty($data['parent_company']) ? null : self::fromArray($data['parent_company']),
        );
    }
}
