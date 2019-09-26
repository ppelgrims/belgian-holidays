<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class ArmisticeDayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isArmisticeDay($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::armisticeDay($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 11, 11),
            array(2019, 11, 11),
            array(2020, 11, 11),
            array(2025, 11, 11)
        );
    }
}
