<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class FeastOfTheAscensionTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isFeastOfTheAscension($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::feastOfTheAscension($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 5, 10),
            array(2019, 5, 30),
            array(2020, 5, 21),
            array(2025, 5, 29)
        );
    }
}
