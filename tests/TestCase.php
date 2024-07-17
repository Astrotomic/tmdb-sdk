<?php

namespace Tests;

use Astrotomic\Tmdb\TMDB;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Saloon\Http\Faking\Fixture;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected string $token;

    protected TMDB $tmdb;

    protected function setUp(): void
    {
        parent::setUp();

        $mock = new MockClient([
            TMDB::class => function (PendingRequest $request): Fixture {
                $name = (string) Str::of(parse_url($request->getUrl(), PHP_URL_PATH))
                    ->after('/3/')
                    ->trim('/')
                    ->when(
                        value: $request->query()->isNotEmpty(),
                        callback: function (Stringable $path) use ($request): Stringable {
                            $data = $request->query()->all();
                            ksort($data);

                            return $path->append('/'.http_build_query($data));
                        }
                    );

                return MockResponse::fixture($name);
            },
        ]);

        $this->tmdb = new TMDB(getenv('TMDB_TOKEN'));
        $this->tmdb->withMockClient($mock);
    }
}
