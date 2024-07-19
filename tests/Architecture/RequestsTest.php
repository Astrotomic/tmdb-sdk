<?php

use Saloon\Http\Request;
use Saloon\Traits\Request\CreatesDtoFromResponse;

arch('Astrotomic\Tmdb\Requests')
    ->expect('Astrotomic\Tmdb\Requests')
    ->toBeClasses()
    ->toExtend(Request::class)
    ->toUse(CreatesDtoFromResponse::class);
