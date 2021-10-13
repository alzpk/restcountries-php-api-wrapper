<?php

namespace Alzpk\RestCountriesPhpApiWrapper\ValueObjects;

class Translation
{
    private string $countryCode;
    private string $value;

    public function __construct(string $countryCode, string $value)
    {
        $this->countryCode = $countryCode;
        $this->value = $value;
    }

    public static function fromKeyAndValue(string $key, string $value): self
    {
        return new self($key, $value);
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
            'country_code' => $this->countryCode,
            'value' => $this->value
        ];
    }
}