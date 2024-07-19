<?php

namespace Astrotomic\Tmdb\Collections;

use Astrotomic\Tmdb\Data\PersonCredit;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as IlluminateCollection;
use Illuminate\Support\Str;

/**
 * @extends IlluminateCollection<array-key, PersonCredit>
 */
class PersonCreditCollection extends IlluminateCollection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, PersonCredit>
     */
    public static function fromArray(?array $data): self
    {
        return static::make(Arr::map(
            array: $data ?? [],
            callback: function (array $item) {
                try {
                    return PersonCredit::fromArray($item);
                } catch (\ValueError $error) {
                    if (str_ends_with($error->getMessage(), 'is not a valid backing value for enum Astrotomic\Tmdb\Enums\Job')) {
                        $value = Str::between($error->getMessage(), '"', '"');
                        $case = (string) Str::of($value)
                            ->replace('&', ' and ')
                            ->slug(' ')
                            ->title()
                            ->replace(' ', '_')
                            ->replace('24', 'TwentyFour', false)
                            ->replace('2d', 'TwoD', false)
                            ->replace('3d', 'ThreeD', false);

                        file_put_contents(__DIR__.'/jobs.txt', "case {$case} = '{$value}';".PHP_EOL, FILE_APPEND | LOCK_EX);
                    }

                    throw $error;
                }
            }
        ));
    }

    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->ensure(PersonCredit::class);
    }
}
