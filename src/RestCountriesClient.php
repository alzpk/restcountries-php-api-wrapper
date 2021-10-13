<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper;

use Alzpk\RestCountriesPhpApiWrapper\Models\Country;
use GuzzleHttp\Client;

final class RestCountriesClient implements ClientInterface
{
    CONST baseUri = 'https://restcountries.eu';

    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::baseUri
        ]);
    }

    /** @return list<Country> */
    public function all(): array
    {
        return $this->request("/rest/v2/all");
    }

    /** @return list<Country> */
    public function name(string $name): array
    {
        return $this->request("/rest/v2/name/{$name}");
    }

    /** @return list<Country> */
    public function code(string $code): array
    {
        return $this->request("/rest/v2/alpha/{$code}");
    }

    /** @return list<Country> */
    public function codes(array $codes): array
    {
        $stringedCodes = implode(';', $codes);
        return $this->request("/rest/v2/alpha?codes={$stringedCodes}");
    }

    /** @return list<Country> */
    public function currency(string $currency): array
    {
        return $this->request("/rest/v2/currency/{$currency}");
    }

    /** @return list<Country> */
    public function language(string $language): array
    {
        return $this->request("/rest/v2/lang/{$language}");
    }

    /** @return list<Country> */
    public function capital(string $capital): array
    {
        return $this->request("/rest/v2/capital/{$capital}");
    }

    /** @return list<Country> */
    public function callingCode(string $callingCode): array
    {
        return $this->request("/rest/v2/callingcode/{$callingCode}");
    }

    /** @return list<Country> */
    public function region(string $region): array
    {
        return $this->request("/rest/v2/region/{$region}");
    }

    /** @return list<Country> */
    public function regionalBloc(string $regionalBloc): array
    {
        return $this->request("/rest/v2/regionalbloc/{$regionalBloc}");
    }

    /** @return list<Country> */
    private function request(string $endpoint): array
    {
        $response = $this->client
            ->get($endpoint)
            ->getBody()
            ->getContents();

        return array_map(function (array $response) {
            return Country::fromResponse($response);
        }, json_decode($response, true));
    }
}