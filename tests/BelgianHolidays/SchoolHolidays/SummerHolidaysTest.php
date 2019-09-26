<?php

namespace Tests\BelgianHolidays\SchoolHolidays;

use Carbon\CarbonPeriod;
use Tests\BaseTest;

final class SummerHolidaysTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param CarbonPeriod $period
     */
    public function isSummerHoliday($period)
    {
        $year = $period->getStartDate()->format('Y');
        $holiday = CarbonPeriod::summerHolidays($year);
        $this->assertEquals($period->getStartDate(), $holiday->getStartDate());
        $this->assertEquals($period->getEndDate(), $holiday->getEndDate());
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(CarbonPeriod::create('2018-07-01', '2018-08-31')),
            array(CarbonPeriod::create('2019-07-01', '2019-08-31')),
            array(CarbonPeriod::create('2020-07-01', '2020-08-31')),
            array(CarbonPeriod::create('2025-07-01', '2025-08-31')),
        );
    }
}
