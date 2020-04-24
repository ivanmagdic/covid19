<?php

namespace Imagdic\Covid19;

use PHPUnit\Framework\TestCase;

class Covid19Test extends TestCase
{
    protected $covid19;
    protected $countryName;

    public function setUp(): void
    {
        parent::setUp();
        $this->covid19 = new Covid19();
        $this->countryName = 'Switzerland';
    }

    public function tearDown(): void
    {
        $this->covid19 = null;
    }

    public function testSummary()
    {
        $response = $this->covid19->summary();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('Global', $response);
        $this->assertArrayHasKey('Countries', $response);
        $this->assertIsArray($response['Global']);
        $this->assertIsArray($response['Countries']);
    }

    public function testConfirmedByCountry()
    {
        $response = $this->covid19->confirmedByCountry($this->countryName);
        $this->assertIsArray($response);
    }

    public function testRecoveredByCountry()
    {
        $response = $this->covid19->recoveredByCountry($this->countryName);
        $this->assertIsArray($response);
    }

    public function testDeathsByCountry()
    {
        $response = $this->covid19->deathsByCountry($this->countryName);
        $this->assertIsArray($response);
    }

    public function testAllCasesByCountry()
    {
        $response = $this->covid19->allCasesByCountry($this->countryName);
        $this->assertIsArray($response);
    }
}
