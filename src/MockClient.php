<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper;

use Alzpk\RestCountriesPhpApiWrapper\Models\Country;

final class MockClient implements ClientInterface
{
    /** @return list<Country> */
    public function all(): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function name(string $name): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function code(string $code): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function codes(array $codes): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function currency(string $currency): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function language(string $language): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function capital(string $capital): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function callingCode(string $callingCode): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function region(string $region): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    public function regionalBloc(string $regionalBloc): array
    {
        return $this->get();
    }

    /** @return list<Country> */
    private function get(): array
    {
        return array_map(function (array $response) {
            return Country::fromResponse($response);
        }, json_decode($this->jsonResponse(), true));
    }

    private function jsonResponse(): string
    {
        return '[{"name":"Denmark","topLevelDomain":[".dk"],"alpha2Code":"DK","alpha3Code":"DNK","callingCodes":["45"],"capital":"Copenhagen","altSpellings":["DK","Danmark","Kingdom of Denmark","Kongeriget Danmark"],"region":"Europe","subregion":"Northern Europe","population":5717014,"latlng":[56.0,10.0],"demonym":"Danish","area":43094.0,"gini":24.0,"timezones":["UTC-04:00","UTC-03:00","UTC-01:00","UTC","UTC+01:00"],"borders":["DEU"],"nativeName":"Danmark","numericCode":"208","currencies":[{"code":"DKK","name":"Danish krone","symbol":"kr"}],"languages":[{"iso639_1":"da","iso639_2":"dan","name":"Danish","nativeName":"dansk"}],"translations":{"de":"Dänemark","es":"Dinamarca","fr":"Danemark","ja":"デンマーク","it":"Danimarca","br":"Dinamarca","pt":"Dinamarca","nl":"Denemarken","hr":"Danska","fa":"دانمارک"},"flag":"https://restcountries.eu/data/dnk.svg","regionalBlocs":[{"acronym":"EU","name":"European Union","otherAcronyms":[],"otherNames":[]}],"cioc":"DEN"}]';
    }
}