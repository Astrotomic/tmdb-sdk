<?php

declare(strict_types=1);

namespace Astrotomic\Tmdb\Enums;

enum MovieStatus: string
{
    case Rumored = 'Rumored';
    case Planned = 'Planned';
    case In_Production = 'In Production';
    case Post_Production = 'Post Production';
    case Released = 'Released';
    case Canceled = 'Canceled';
}
