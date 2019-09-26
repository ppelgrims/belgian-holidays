[![Build Status](https://travis-ci.org/ppelgrims/belgian-holidays.svg?branch=master)](https://travis-ci.org/ppelgrims/belgian-holidays)
[![GitHub](https://img.shields.io/github/license/ppelgrims/belgian-holidays.svg)](https://github.com/ppelgrims/belgian-holidays/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/ppelgrims/belgian-holidays.svg)](https://packagist.org/packages/ppelgrims/belgian-holidays)

# Belgian Holidays

A mixin for [Carbon](https://github.com/briannesbitt/carbon) to provide dates for Belgian holiday.

## Installation

```bash
$ composer require ppelgrims/belgian-holidays
```

## Usage

```php
use BelgianHolidays\PublicHolidaysMixin;
use BelgianHolidays\SchoolHolidaysMixin;

Carbon::mixin(new PublicHolidaysMixin());
Carbon::easterMonday()->toDateString();     // "2019-04-22"
Carbon::labourDay(2020)->toDateString();    // "2020-05-01"

CarbonPeriod::mixin(new SchoolHolidaysMixin());

```

### Available methods

```php
Carbon::newYearsDay();
Carbon::easterMonday();
Carbon::labourDay();
Carbon::assumptionOfMary();
Carbon::pentecostMonday();
Carbon::nationalHoliday();
Carbon::feastOfTheAscencion();
Carbon::allSaintsDay();
Carbon::armisticeDay();
Carbon::christmas();

CarbonPeriod::springHolidays();
CarbonPeriod::easterHolidays();
CarbonPeriod::summerHolidays();
CarbonPeriod::autumnHolidays();
CarbonPeriod::christmasHolidays();
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
