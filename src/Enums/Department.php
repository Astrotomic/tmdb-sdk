<?php

namespace Astrotomic\Tmdb\Enums;

enum Department: string
{
    case Acting = 'Acting';
    case Directing = 'Directing';
    case Lighting = 'Lighting';
    case Editing = 'Editing';
    case Production = 'Production';
    case Camera = 'Camera';
    case Sound = 'Sound';
    case Costume_And_Make_Up = 'Costume & Make-Up';
    case Art = 'Art';
    case Visual_Effects = 'Visual Effects';
    case Crew = 'Crew';
}
