<?php

namespace Tests;

use BelgianHolidays\PublicHolidaysMixin;
use BelgianHolidays\SchoolHolidaysMixin;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Carbon::mixin(new PublicHolidaysMixin());
        CarbonPeriod::mixin(new SchoolHolidaysMixin());
    }
}
