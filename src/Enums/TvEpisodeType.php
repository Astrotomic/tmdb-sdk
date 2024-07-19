<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Enums;

enum TvEpisodeType: string
{
    case Standard = 'standard';
    case Finale = 'finale';
}
