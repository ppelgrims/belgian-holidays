<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class NewYearsDayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isNewYearsDay($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::newYearsDay($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 1, 1),
            array(2019, 1, 1),
            array(2020, 1, 1),
            array(2025, 1, 1)
        );
    }
}
