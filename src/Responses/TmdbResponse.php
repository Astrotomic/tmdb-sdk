<?php

namespace Astrotomic\Tmdb\Responses;

use Astrotomic\Tmdb\Exceptions\BadResponseException;
use Astrotomic\Tmdb\Exceptions\ClientException;
use Astrotomic\Tmdb\Exceptions\InvalidApiKeyException;
use Astrotomic\Tmdb\Exceptions\ResourceNotFoundException;
use Astrotomic\Tmdb\Exceptions\ServerException;
use Sammyjo20\Saloon\Http\SaloonResponse;

class TmdbResponse extends SaloonResponse
{
    public function toException(): ?BadResponseException
    {
        return match (true) {
            $this->clientError() => match ($this->status()) {
                401 => InvalidApiKeyException::fromResponse($this),
                404 => ResourceNotFoundException::fromResponse($this),
                default => ClientException::fromResponse($this),
            },
            $this->serverError() => ServerException::fromResponse($this),
            $this->failed() => BadResponseException::fromResponse($this),
            default => null,
        };
    }
}
