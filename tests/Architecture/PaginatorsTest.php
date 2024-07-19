<?php

use Saloon\PaginationPlugin\Paginator;

arch('Astrotomic\Tmdb\Paginators')
    ->expect('Astrotomic\Tmdb\Paginators')
    ->toBeClasses()
    ->toExtend(Paginator::class);
