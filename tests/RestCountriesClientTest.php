<?php

namespace Alzpk\RestCountriesPhpApiWrapper\Tests;

use Alzpk\RestCountriesPhpApiWrapper\ClientInterface;
use Alzpk\RestCountriesPhpApiWrapper\MockClient;
use Alzpk\RestCountriesPhpApiWrapper\RestCountriesClient;
use PHPUnit\Framework\TestCase;

class RestCountriesClientTest extends TestCase
{
    public function dataProvider()
    {
        yield [new MockClient()];
        //yield [new RestCountriesClient()]; // Uncomment to test the actual API
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_all_countries(ClientInterface $client)
    {
        $countries = $client->all();

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_name(ClientInterface $client)
    {
        $countries = $client->searchByName('Belgium');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_code(ClientInterface $client)
    {
        $countries = $client->searchByCode('208');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_codes(ClientInterface $client)
    {
        $countries = $client->searchByCodes(['208', '209']);

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_currency(ClientInterface $client)
    {
        $countries = $client->searchByCurrency('DKK');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_language(ClientInterface $client)
    {
        $countries = $client->searchByLanguage('Danish');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_capital(ClientInterface $client)
    {
        $countries = $client->searchByCapital('Copenhagen');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_calling_code(ClientInterface $client)
    {
        $countries = $client->searchByCode('45');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_region(ClientInterface $client)
    {
        $countries = $client->searchByRegion('Europe');

        $this->assertIsArray($countries);
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_can_get_countries_by_regional_bloc(ClientInterface $client)
    {
        $countries = $client->searchBySubregion('EU');

        $this->assertIsArray($countries);
    }
}
