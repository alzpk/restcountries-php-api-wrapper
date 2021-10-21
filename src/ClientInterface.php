<?php

namespace Alzpk\RestCountriesPhpApiWrapper;

interface ClientInterface
{
    public function all(): array;

    public function searchByName(string $name): array;

    public function searchByCode(string $code): array;

    public function searchByCodes(array $codes): array;

    public function searchByCurrency(string $currency): array;

    public function searchByLanguage(string $language): array;

    public function searchByCapital(string $capital): array;

    public function searchByRegion(string $region): array;

    public function searchBySubregion(string $subregion): array;
}