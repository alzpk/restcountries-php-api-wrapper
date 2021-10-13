<?php

namespace Alzpk\RestCountriesPhpApiWrapper\ValueObjects;

class Currency
{
    private string $code;
    private string $name;
    private string $symbol;

    public function __construct(string $code, string $name, string $symbol)
    {
        $this->code = $code;
        $this->name = $name;
        $this->symbol = $symbol;
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            $response['code'] ?? '',
            $response['name'] ?? '',
            $response['symbol'] ?? '',
        );
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'symbol' => $this->symbol,
        ];
    }
}