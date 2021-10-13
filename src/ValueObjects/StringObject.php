<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper\ValueObjects;

abstract class StringObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new static($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}