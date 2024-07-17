<?php

use Astrotomic\PhpunitAssertions\UrlAssertions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Pest\Expectation;
use Tests\TestCase;

uses(TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
*/

expect()->extend('assert', function (Closure $assertions): Expectation {
    $assertions($this->value);

    return $this;
});

expect()->extend('toBeUrl', function (string $expected): Expectation {
    UrlAssertions::assertValidLoose($this->value);

    return $this->toBe($expected);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('requests')) {
    function requests(?string $pattern = null): Collection
    {
        return Http::recorded()
            ->pluck(0)
            ->map->url()
            ->when(
                $pattern,
                fn (Collection $urls): Collection => $urls->filter(fn (string $url) => str_contains($url, $pattern))
            );
    }
}
