<?php

namespace Astrotomic\Tmdb\Data;

class Company
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $originCountry,
        public readonly ?string $logoPath,
        public readonly ?string $description,
        public readonly ?string $headquarters,
        public readonly ?string $homepage,
        public readonly ?self $parentCompany,
    ) {
    }

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
