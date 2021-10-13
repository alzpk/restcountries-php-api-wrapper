<?php

declare(strict_types=1);

namespace Alzpk\RestCountriesPhpApiWrapper\Models;

use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\AlternativeSpelling;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\Border;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\CallingCode;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\Currency;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\Language;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\RegionalBloc;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\Timezone;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\TopLevelDomain;
use Alzpk\RestCountriesPhpApiWrapper\ValueObjects\Translation;

final class Country implements ModelInterface
{
    private string $name;
    private string $nativeName;
    private string $capital;
    private int $numericCode;
    private string $alpha2Code;
    private string $alpha3Code;
    private string $region;
    private string $subregion;
    private int $population;
    private ?float $lat;
    private ?float $lng;
    private string $demonym;
    private float $area;
    private string $flag;
    private ?string $cioc;

    /** @var list<TopLevelDomain> $topLevelDomain */
    private array $topLevelDomain;
    /** @var list<CallingCode> $callingCodes */
    private array $callingCodes;
    /** @var list<AlternativeSpelling> $altSpellings */
    private array $altSpellings;
    /** @var list<Timezone> $timezones */
    private array $timezones;
    /** @var list<Border> $borders */
    private ?array $borders;
    /** @var list<Currency> $currencies */
    private array $currencies;
    /** @var list<Language> $languages */
    private array $languages;
    /** @var list<Translation> $translations */
    private array $translations;
    /** @var list<RegionalBloc> $regionalBlocs */
    private array $regionalBlocs;

    /**
     * @param list<TopLevelDomain> $topLevelDomain
     * @param list<CallingCode> $callingCodes
     * @param list<AlternativeSpelling> $altSpellings
     * @param list<Timezone> $timezones
     * @param list<Border>|null $borders
     * @param list<Currency> $currencies
     * @param list<Language> $languages
     * @param list<Translation> $translations
     * @param list<RegionalBloc> $regionalBlocs
     */
    public function __construct(string $name, string $nativeName, string $capital, int $numericCode, string $alpha2Code,
                                string $alpha3Code, string $region, string $subregion, int $population,
                                ?float $lat, ?float $lng, string $demonym, float $area, string $flag,
                                ?string $cioc, array $topLevelDomain, array $callingCodes, array $altSpellings,
                                array $timezones, ?array $borders, array $currencies, array $languages,
                                array $translations, array $regionalBlocs)
    {
        $this->name = $name;
        $this->nativeName = $nativeName;
        $this->capital = $capital;
        $this->numericCode = $numericCode;
        $this->alpha2Code = $alpha2Code;
        $this->alpha3Code = $alpha3Code;
        $this->region = $region;
        $this->subregion = $subregion;
        $this->population = $population;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->demonym = $demonym;
        $this->area = $area;
        $this->flag = $flag;
        $this->cioc = $cioc;
        $this->topLevelDomain = $topLevelDomain;
        $this->callingCodes = $callingCodes;
        $this->altSpellings = $altSpellings;
        $this->timezones = $timezones;
        $this->borders = $borders;
        $this->currencies = $currencies;
        $this->languages = $languages;
        $this->translations = $translations;
        $this->regionalBlocs = $regionalBlocs;
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            $response['name'],
            $response['nativeName'],
            $response['capital'],
            intval($response['numericCode']),
            $response['alpha2Code'],
            $response['alpha3Code'],
            $response['region'],
            $response['subregion'],
            intval($response['population']),
            isset($response['latlng'][0]) ? floatval($response['latlng'][0]) : null,
            isset($response['latlng'][1]) ? floatval($response['latlng'][1]) : null,
            $response['demonym'],
            floatval($response['area']),
            $response['flag'],
            $response['cioc'],
            array_map(function(string $value) {
                return TopLevelDomain::fromString($value);
            }, $response['topLevelDomain']),
            array_map(function(string $value) {
                return CallingCode::fromString($value);
            }, $response['callingCodes']),
            array_map(function(string $value) {
                return AlternativeSpelling::fromString($value);
            }, $response['altSpellings']),
            array_map(function(string $value) {
                return Timezone::fromString($value);
            }, $response['timezones']),
            array_map(function(string $value) {
                return Border::fromString($value);
            }, $response['borders']),
            array_map(function(array $response) {
                return Currency::fromResponse($response);
            }, $response['currencies']),
            array_map(function(array $response) {
                return Language::fromResponse($response);
            }, $response['languages']),
            array_map(function(?string $value, ?string $key) {
                return Translation::fromKeyAndValue($key ?? '', $value ?? '');
            }, $response['translations'], array_keys($response['translations'])),
            array_map(function(array $response) {
                return RegionalBloc::fromResponse($response);
            }, $response['regionalBlocs'])
        );
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
    public function getNativeName(): string
    {
        return $this->nativeName;
    }

    /**
     * @return string
     */
    public function getCapital(): string
    {
        return $this->capital;
    }

    /**
     * @return int
     */
    public function getNumericCode(): int
    {
        return $this->numericCode;
    }

    /**
     * @return string
     */
    public function getAlpha2Code(): string
    {
        return $this->alpha2Code;
    }

    /**
     * @return string
     */
    public function getAlpha3Code(): string
    {
        return $this->alpha3Code;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getSubregion(): string
    {
        return $this->subregion;
    }

    /**
     * @return int
     */
    public function getPopulation(): int
    {
        return $this->population;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getDemonym(): string
    {
        return $this->demonym;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return $this->area;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag;
    }

    /**
     * @return string|null
     */
    public function getCioc(): ?string
    {
        return $this->cioc;
    }

    /**
     * @return list<TopLevelDomain>
     */
    public function getTopLevelDomain(): array
    {
        return $this->topLevelDomain;
    }

    /**
     * @return list<CallingCode>
     */
    public function getCallingCodes(): array
    {
        return $this->callingCodes;
    }

    /**
     * @return list<AlternativeSpelling>
     */
    public function getAltSpellings(): array
    {
        return $this->altSpellings;
    }

    /**
     * @return list<Timezone>
     */
    public function getTimezones(): array
    {
        return $this->timezones;
    }

    /**
     * @return list<Border>|null
     */
    public function getBorders(): ?array
    {
        return $this->borders;
    }

    /**
     * @return list<Currency>
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    /**
     * @return list<Language>
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @return list<Translation>
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @return list<RegionalBloc>
     */
    public function getRegionalBlocs(): array
    {
        return $this->regionalBlocs;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'native_name' => $this->nativeName,
            'capital' => $this->capital,
            'numeric_code' => $this->numericCode,
            'alpha_2_code' => $this->alpha2Code,
            'alpha_3_code' => $this->alpha3Code,
            'region' => $this->region,
            'subregion' => $this->subregion,
            'population' => $this->population,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'demonym' => $this->demonym,
            'area' => $this->area,
            'flag' => $this->flag,
            'cioc' => $this->cioc,
            'top_level_domain' => array_map(function (TopLevelDomain $topLevelDomain) {
                return $topLevelDomain->toString();
            }, $this->topLevelDomain),
            'calling_codes' => array_map(function (CallingCode $callingCode) {
                return $callingCode->toInt();
            }, $this->callingCodes),
            'alt_spellings' => array_map(function (AlternativeSpelling $alternativeSpelling) {
                return $alternativeSpelling->toString();
            }, $this->altSpellings),
            'timezones' => array_map(function (Timezone $timezone) {
                return $timezone->toString();
            }, $this->timezones),
            'borders' => array_map(function (Border $border) {
                return $border->toString();
            }, $this->borders),
            'currencies' => array_map(function (Currency $currency) {
                return $currency->toArray();
            }, $this->currencies),
            'languages' => array_map(function (Language $language) {
                return $language->toArray();
            }, $this->languages),
            'translations' => array_map(function (Translation $translation) {
                return $translation->toArray();
            }, $this->translations),
            'regional_blocs' => array_map(function (RegionalBloc $regionalBloc) {
                return $regionalBloc->toArray();
            }, $this->regionalBlocs),
        ];
    }
}