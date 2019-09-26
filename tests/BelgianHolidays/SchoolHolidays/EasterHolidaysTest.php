<?php

namespace Tests\BelgianHolidays\SchoolHolidays;

use Carbon\CarbonPeriod;
use Tests\BaseTest;

final class EasterHolidaysTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param CarbonPeriod $period
     */
    public function isEasterHolidays($period)
    {
        $year = $period->getStartDate()->format('Y');
        $holiday = CarbonPeriod::easterHolidays($year);
        $this->assertEquals($period->getStartDate(), $holiday->getStartDate());
        $this->assertEquals($period->getEndDate(), $holiday->getEndDate());
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(CarbonPeriod::create('2017-04-03', '2017-04-17')),
            array(CarbonPeriod::create('2018-04-02', '2018-04-15')),
            array(CarbonPeriod::create('2019-04-08', '2019-04-22')),
            array(CarbonPeriod::create('2020-04-06', '2020-04-19')),
            array(CarbonPeriod::create('2021-04-05', '2021-04-18')),
        );
    }
}
