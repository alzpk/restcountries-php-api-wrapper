<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper;

final class MockClient implements ClientInterface
{
    public function all(): array
    {
        return $this->get();
    }

    public function searchByName(string $name): array
    {
        return $this->get();
    }

    public function searchByCode(string $code): array
    {
        return $this->get();
    }

    public function searchByCodes(array $codes): array
    {
        return $this->get();
    }

    public function searchByCurrency(string $currency): array
    {
        return $this->get();
    }

    public function searchByLanguage(string $language): array
    {
        return $this->get();
    }

    public function searchByCapital(string $capital): array
    {
        return $this->get();
    }

    public function searchByRegion(string $region): array
    {
        return $this->get();
    }

    public function searchBySubregion(string $subregion): array
    {
        return $this->get();
    }

    private function get(): array
    {
        return json_decode($this->jsonResponse(), true);
    }

    private function jsonResponse(): string
    {
        return file_get_contents("../tests/Data/country-response.json");
    }
}