<?php

use Saloon\Http\BaseResource;

arch('Astrotomic\Tmdb\Resources')
    ->expect('Astrotomic\Tmdb\Resources')
    ->toBeClasses()
    ->toExtend(BaseResource::class);
