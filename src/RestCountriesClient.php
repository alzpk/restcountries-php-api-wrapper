<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper;

use GuzzleHttp\Client;

final class RestCountriesClient implements ClientInterface
{
    CONST baseUri = 'https://restcountries.com';

    private Client $client;
    private string $apiVersion;

    public function __construct()
    {
        $this->apiVersion = 'v3.1';
        $this->client = new Client([
            'base_uri' => self::baseUri
        ]);
    }

    public function all(): array
    {
        return $this->request("/{$this->apiVersion}/all");
    }

    public function searchByName(string $name): array
    {
        return $this->request("/{$this->apiVersion}/name/{$name}");
    }

    public function searchByCode(string $code): array
    {
        return $this->request("/{$this->apiVersion}/alpha/{$code}");
    }

    public function searchByCodes(array $codes): array
    {
        $stringedCodes = implode(';', $codes);
        return $this->request("/{$this->apiVersion}/alpha?codes={$stringedCodes}");
    }

    public function searchByCurrency(string $currency): array
    {
        return $this->request("/{$this->apiVersion}/currency/{$currency}");
    }

    public function searchByLanguage(string $language): array
    {
        return $this->request("/{$this->apiVersion}/lang/{$language}");
    }

    public function searchByCapital(string $capital): array
    {
        return $this->request("/{$this->apiVersion}/capital/{$capital}");
    }

    public function searchByRegion(string $region): array
    {
        return $this->request("/{$this->apiVersion}/region/{$region}");
    }

    public function searchBySubregion(string $subregion): array
    {
        return $this->request("/{$this->apiVersion}/subregion/{$subregion}");
    }

    private function request(string $endpoint): array
    {
        $response = $this->client
            ->get($endpoint)
            ->getBody()
            ->getContents();

        return json_decode($response, true);
    }
}