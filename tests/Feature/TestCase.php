<?php

namespace Tests\Feature;

use Astrotomic\Tmdb\TMDB;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use InvalidArgumentException;
use Sammyjo20\Saloon\Http\MockResponse;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Tests\MockClient;
use Throwable;

abstract class TestCase extends \Tests\TestCase
{
    protected string $token;
    protected TMDB $tmdb;

    protected function setUp(): void
    {
        parent::setUp();

        $this->token = getenv('TMDB_TOKEN');

        $this->tmdb = new TMDB($this->token);

        $mockClient = new MockClient([
            function (SaloonRequest $request): MockResponse {
                if (! str_starts_with($request->getFullRequestUrl(), 'https://api.themoviedb.org/3/')) {
                    return MockResponse::make()->throw(
                        fn (Request $guzzleRequest): Throwable => new ConnectException('Wrong base-url.', $guzzleRequest)
                    );
                }

                $body = $this->fixture(
                    Str::after(parse_url($request->getFullRequestUrl(), PHP_URL_PATH), '/3/'),
                    parse_url($request->getFullRequestUrl(), PHP_URL_QUERY)
                );

                return MockResponse::make($body, 200, [
                    'Content-Type' => 'application/json',
                ]);
            },
        ]);

        $this->tmdb->withMockClient($mockClient);
    }

    protected function tearDown(): void
    {
        /** @var \Sammyjo20\Saloon\Http\SaloonResponse $response */
        foreach ($this->tmdb->getMockClient()->getRecordedResponses() as $response) {
            if ($response->successful()) {
                $request = $response->getOriginalRequest();

                $filepath = $this->fixturePath(
                    Str::after(parse_url($request->getFullRequestUrl(), PHP_URL_PATH), '/3/'),
                    http_build_query($request->getQuery())
                );

                @mkdir(dirname($filepath), 0777, true);
                file_put_contents(
                    $filepath,
                    json_encode($response->json(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                );
            }
        }

        parent::tearDown();
    }

    public function fixture(string $path, ?string $query = null): array
    {
        $fixturePath = $this->fixturePath($path, $query);

        if (! file_exists($fixturePath)) {
            throw new InvalidArgumentException($fixturePath);
        }

        $json = file_get_contents($fixturePath);

        return json_decode($json, true, flags: JSON_THROW_ON_ERROR);
    }

    protected function fixturePath(string $path, ?string $query = null): string
    {
        return Str::of($path)
            ->trim('/')
            ->prepend(__DIR__.'/../fixtures/')
            ->when($query, function (Stringable $path, string $query): Stringable {
                $data = [];
                parse_str($query, $data);
                ksort($data);

                return $path->append('/'.http_build_query($data));
            })
            ->finish('.json');
    }
}
