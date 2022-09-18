<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Astrotomic\PhpunitAssertions\UrlAssertions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Pest\Expectation;

uses(\Tests\Feature\TestCase::class)->in('Feature');

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
