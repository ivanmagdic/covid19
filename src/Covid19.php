<?php


namespace Imagdic\Covid19;


use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class Covid19
{
    private $endpoint = 'https://api.covid19api.com/';
    private $client;

    private static $confirmed = 'confirmed';
    private static $recovered = 'recovered';
    private static $deaths = 'deaths';

    /**
     * Covid19 constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * A summary of new and total cases per country updated daily.
     *
     * @return array
     * @throws \Exception
     */
    public function summary(): array
    {
        return $this->api('summary');
    }

    /**
     * Get confirmed cases for specific country
     *
     * @param string $countryName
     * @return array
     * @throws \Exception
     */
    public function confirmedByCountry(string $countryName): array
    {
        return $this->country($countryName, self::$confirmed);
    }

    /**
     * Get recovered cases for specific country
     *
     * @param string $countryName
     * @return array
     * @throws \Exception
     */
    public function recoveredByCountry(string $countryName): array
    {
        return $this->country($countryName, self::$recovered);
    }

    /**
     * Get death cases for specific country
     *
     * @param string $countryName
     * @return array
     * @throws \Exception
     */
    public function deathsByCountry(string $countryName): array
    {
        return $this->country($countryName, self::$deaths);
    }

    /**
     * Get all cases for specific country
     *
     * @param string $countryName
     * @return array
     * @throws \Exception
     */
    public function allCasesByCountry(string $countryName): array
    {
        return $this->country($countryName);
    }

    /**
     * @param string $countryName
     * @param string|null $case
     * @return array
     * @throws \Exception
     */
    private function country(string $countryName, string $case = null): array
    {
        $param = 'country/' . $countryName;
        if (!is_null($case)) {
            $param .= '/status/' . $case;
        }
        return $this->api($param);
    }

    /**
     * Get data from API endpoint
     *
     * @param $param
     * @return array
     * @throws \Exception
     */
    private function api($param): array
    {
        $response = $this->get($param);
        return $this->decode($response);
    }

    /**
     * Issue GET request to API endpoint
     *
     * @param string $param
     * @return StreamInterface
     * @throws \Exception
     */
    private function get(string $param): StreamInterface
    {
        $url = $this->endpoint . $param;
        return $response = $this->client->request('GET', $url)->getBody();
    }

    /**
     * Decode API response into array
     *
     * @param $response
     * @return array
     */
    private function decode($response): array
    {
        return json_decode($response, true);
    }
}
