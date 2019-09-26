<?php

namespace Tests\BelgianHolidays\SchoolHolidays;

use Carbon\CarbonPeriod;
use Tests\BaseTest;

final class SpringHolidaysTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param CarbonPeriod $period
     */
    public function isSpringHolidays($period)
    {
        $year = $period->getStartDate()->format('Y');
        $holiday = CarbonPeriod::springHolidays($year);
        $this->assertEquals($period->getStartDate(), $holiday->getStartDate());
        $this->assertEquals($period->getEndDate(), $holiday->getEndDate());
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(CarbonPeriod::create('2017-02-27', '2017-03-05')),
            array(CarbonPeriod::create('2018-02-12', '2018-02-18')),
            array(CarbonPeriod::create('2019-03-04', '2019-03-10')),
            array(CarbonPeriod::create('2020-02-24', '2020-03-01')),
            array(CarbonPeriod::create('2021-02-15', '2021-02-21')),
        );
    }
}
