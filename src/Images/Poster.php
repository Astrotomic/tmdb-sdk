<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Images;

class Poster extends Image
{
    public const SIZE_W92 = 92;

    public const SIZE_W154 = 154;

    public const SIZE_W185 = 185;

    public const SIZE_W342 = 342;

    public const SIZE_W500 = 500;

    public const SIZE_W780 = 780;

    protected ?int $size = self::SIZE_W780;

    public function width(): int
    {
        return $this->size ?? 2000;
    }

    public function height(): int
    {
        return $this->size
            ? (int) floor($this->size / 2 * 3)
            : 3000;
    }
}
