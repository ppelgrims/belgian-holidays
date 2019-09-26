<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class NationalHolidayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isNationalHoliday($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::nationalHoliday($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 7, 21),
            array(2019, 7, 21),
            array(2020, 7, 21),
            array(2025, 7, 21)
        );
    }
}
