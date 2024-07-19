<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Enums;

enum TvSeriesStatus: string
{
    case Returning_Series = 'Returning Series';
    case Ended = 'Ended';
    case Canceled = 'Canceled';
}
