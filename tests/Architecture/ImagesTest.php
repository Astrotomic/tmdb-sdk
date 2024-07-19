<?php

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Jsonable;

arch('Astrotomic\Tmdb\Images')
    ->expect('Astrotomic\Tmdb\Images')
    ->toBeClasses()
    ->toImplement(Arrayable::class)
    ->toImplement(Jsonable::class)
    ->toImplement(JsonSerializable::class)
    ->toImplement(Stringable::class)
    ->toImplement(Htmlable::class);
