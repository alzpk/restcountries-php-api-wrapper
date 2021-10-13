<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper\ValueObjects;

abstract class IntegerObject
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function fromInteger(int $value): self
    {
        return new static($value);
    }

    public static function fromString(string $value): self
    {
        return new static(intval($value));
    }

    public function toInt(): int
    {
        return $this->value;
    }

    public function toString(): string
    {
        return (string) $this->value;
    }
}