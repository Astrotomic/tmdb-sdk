<?php

namespace Astrotomic\Tmdb\Images;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Stringable;

abstract class Image implements Arrayable, Htmlable, Jsonable, JsonSerializable, Stringable
{
    public const SIZE_ORIGINAL = null;

    protected ?int $size;

    final public function __construct(
        public readonly ?string $path,
        public readonly ?string $alt = null,
    ) {}

    public function size(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    abstract public function width(): int;

    abstract public function height(): int;

    public function url(): ?string
    {
        if (empty($this->path)) {
            return null;
        }

        return sprintf(
            '%s/%s/%s',
            'https://image.tmdb.org/t/p',
            $this->size
                ? "w{$this->size}"
                : 'original',
            ltrim($this->path, '/')
        );
    }

    public function fallback(): string
    {
        return sprintf(
            '%s/%dx%d/9ca3af/ffffff.jpg?text=%s',
            'https://via.placeholder.com',
            $this->width(),
            $this->height(),
            urlencode($this->alt)
        );
    }

    public function __toString(): string
    {
        if (empty($this->path)) {
            return $this->fallback();
        }

        return $this->url();
    }

    public function toHtml(): string
    {
        return <<<HTML
        <img src="{$this}" alt="{$this->alt}" loading="lazy" width="{$this->width()}" height="{$this->height()}"/>
        HTML;
    }

    public function toArray(): array
    {
        return [
            'path' => $this->path,
            'url' => $this->url(),
            'fallback_url' => $this->fallback(),
            'alt' => $this->alt,
            'size' => $this->size,
            'width' => $this->width(),
            'height' => $this->height(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toJson($options = 0): string
    {
        return json_encode($this, JSON_THROW_ON_ERROR | $options);
    }
}
