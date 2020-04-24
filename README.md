Covid19 - Laravel API Wrapper
=========

## Installation

```bash
composer require imagdic/covid19
```

## Usage

```php
// A summary of new and total cases per country updated daily.
$summary = Covid19::summary();

// Get recovered cases for specific country
$recovered = Covid19::recoveredByCountry('countryName');

// Get death cases for specific country
$deaths = Covid19::deathsByCountry('countryName');

// Get confirmed cases for specific country
$confirmed = Covid19::confirmedByCountry('countryName');

// Get all cases for specific country
$allCases = Covid19::allCasesByCountry('countryName');
```

## Example

```php
$allCases = Covid19::allCasesByCountry('Italy');
```

Content of ```$allCases``` variable:
```
...
  [
    "Country": "Italy",
    "CountryCode": "IT",
    "Province": "",
    "City": "",
    "CityCode": "",
    "Lat": "41.87",
    "Lon": "12.57",
    "Confirmed": 115242,
    "Deaths": 13915,
    "Recovered": 18278,
    "Active": 0,
    "Date": "2020-04-02T00:00:00Z"
  ],
  [
    "Country": "Italy",
    "CountryCode": "IT",
    "Province": "",
    "City": "",
    "CityCode": "",
    "Lat": "41.87",
    "Lon": "12.57",
    "Confirmed": 119827,
    "Deaths": 14681,
    "Recovered": 19758,
    "Active": 0,
    "Date": "2020-04-03T00:00:00Z"
  ],
  [
    "Country": "Italy",
    "CountryCode": "IT",
    "Province": "",
    "City": "",
    "CityCode": "",
    "Lat": "41.87",
    "Lon": "12.57",
    "Confirmed": 124632,
    "Deaths": 15362,
    "Recovered": 20996,
    "Active": 0,
    "Date": "2020-04-04T00:00:00Z"
  ],
...
```

## Run Unit Test

```bash
$ php artisan test
```
