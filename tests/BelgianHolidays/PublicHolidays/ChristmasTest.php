<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class ChristmasTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isChristmasDay($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::christmas($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 12, 25),
            array(2019, 12, 25),
            array(2020, 12, 25),
            array(2025, 12, 25)
        );
    }
}
