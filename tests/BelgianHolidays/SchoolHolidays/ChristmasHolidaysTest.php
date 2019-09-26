<?php

namespace Tests\BelgianHolidays\SchoolHolidays;

use Carbon\CarbonPeriod;
use Tests\BaseTest;

final class ChristmasHolidaysTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param CarbonPeriod $period
     */
    public function isChristmasHolidays($period)
    {
        $year = $period->getStartDate()->format('Y');
        $holiday = CarbonPeriod::christmasHolidays($year);
        $this->assertEquals($period->getStartDate(), $holiday->getStartDate());
        $this->assertEquals($period->getEndDate(), $holiday->getEndDate());
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(CarbonPeriod::create('2017-12-25', '2018-01-07')),
            array(CarbonPeriod::create('2018-12-24', '2019-01-06')),
            array(CarbonPeriod::create('2019-12-23', '2020-01-05')),
            array(CarbonPeriod::create('2020-12-21', '2021-01-03')),
            array(CarbonPeriod::create('2021-12-27', '2022-01-09')),
        );
    }
}
