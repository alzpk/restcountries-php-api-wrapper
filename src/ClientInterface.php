<?php

namespace Alzpk\RestCountriesPhpApiWrapper;

use Alzpk\RestCountriesPhpApiWrapper\Models\Country;

interface ClientInterface
{
    /** @return list<Country> */
    public function all(): array;

    /** @return list<Country> */
    public function name(string $name): array;

    /** @return list<Country> */
    public function code(string $code): array;

    /** @return list<Country> */
    public function codes(array $codes): array;

    /** @return list<Country> */
    public function currency(string $currency): array;

    /** @return list<Country> */
    public function language(string $language): array;

    /** @return list<Country> */
    public function capital(string $capital): array;

    /** @return list<Country> */
    public function callingCode(string $callingCode): array;

    /** @return list<Country> */
    public function region(string $region): array;

    /** @return list<Country> */
    public function regionalBloc(string $regionalBloc): array;
}