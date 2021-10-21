# PHP wrapper for Restcountries.com API
PHP wrapper for restcountries.com API, that returns a model with value objects, based on the response from the API.

## Requirements

```json
{
  "php": "^7.4",
  "guzzlehttp/guzzle": "7.4.x-dev",
  "ext-json": "*"
}
```

## Installation

```bash
composer require alzpk/restcountries-php-api-wrapper
```

## Usage examples

```php
$client = new \Alzpk\RestCountriesPhpApiWrapper\RestCountriesClient();

// Fetch all countries
$countries = $client->all();

// Fetch countries by searching names
$countries = $client->searchByName('Denmark');
```

## Client Map

| Method | Params | Example |
|---|---|---|
| _all_ |  | ```$client->all();``` |
| _searchByName_ | (string) Country name | ```$client->searchByName('Denmark');``` |
| _searchByCode_ | (string) Country code | ```$client->searchByCode('208');``` |
| _searchByCodes_ | (array) List of country codes | ```$client->searchByCodes(['208', '209']);``` |
| _searchByCurrency_ | (string) Country currency | ```$client->searchByCurrency('DKK');``` |
| _searchByLanguage_ | (string) Country language | ```$client->searchByLanguage('da');``` |
| _searchByCapital_ | (string) Country capital | ```$client->searchByCapital('Copenhagen');``` |
| _searchByRegion_ | (string) Country region | ```$client->searchByRegion('Europe');``` |
| _searchBySubregion_ | (string) Country subregion | ```$client->searchBySubregion('South');``` |

## More info

_Check https://github.com/amatosg/restcountries for more info._