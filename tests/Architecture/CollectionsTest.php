<?php

use Illuminate\Support\Collection;

arch('Astrotomic\Tmdb\Collections')
    ->expect('Astrotomic\Tmdb\Collections')
    ->toBeClasses()
    ->toExtend(Collection::class)
    ->toHaveMethod('fromArray');
