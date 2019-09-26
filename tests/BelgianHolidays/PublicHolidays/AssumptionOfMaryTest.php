<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class AssumptionOfMaryTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isAssumptionOfMary($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::assumptionOfMary($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 8, 15),
            array(2019, 8, 15),
            array(2020, 8, 15),
            array(2025, 8, 15)
        );
    }
}
