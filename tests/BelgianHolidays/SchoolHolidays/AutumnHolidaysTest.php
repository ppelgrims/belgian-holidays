<?php


namespace Tests\BelgianHolidays\SchoolHolidays;

use Carbon\CarbonPeriod;
use Tests\BaseTest;

final class AutumnHolidaysTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param CarbonPeriod $period
     */
    public function isAutumnHolidays($period)
    {
        $year = $period->getStartDate()->format('Y');
        $holiday = CarbonPeriod::autumnHolidays($year);
        $this->assertEquals($period->getStartDate(), $holiday->getStartDate());
        $this->assertEquals($period->getEndDate(), $holiday->getEndDate());
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(CarbonPeriod::create('2017-10-30', '2017-11-05')),
            array(CarbonPeriod::create('2018-10-29', '2018-11-04')),
            array(CarbonPeriod::create('2019-10-28', '2019-11-03')),
            array(CarbonPeriod::create('2020-11-02', '2020-11-08')),
            array(CarbonPeriod::create('2021-11-01', '2021-11-07')),
        );
    }
}
