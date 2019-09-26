<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class LabourDayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isLabourDay($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::labourDay($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 5, 1),
            array(2019, 5, 1),
            array(2020, 5, 1),
            array(2025, 5, 1)
        );
    }
}
