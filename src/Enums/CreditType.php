<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Enums;

enum CreditType: string
{
    case Cast = 'cast';
    case Crew = 'crew';
}
