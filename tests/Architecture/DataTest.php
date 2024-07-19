<?php

arch('Astrotomic\Tmdb\Data')
    ->expect('Astrotomic\Tmdb\Data')
    ->toBeClasses()
    ->toBeReadonly()
    ->toExtendNothing()
    ->toHaveMethod('fromArray');
