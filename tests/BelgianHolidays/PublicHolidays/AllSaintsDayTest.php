<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class AllSaintsDayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isAllSaintsDay($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $this->assertTrue($date->eq(Carbon::allSaintsDay($year)));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 11, 1),
            array(2019, 11, 1),
            array(2020, 11, 1),
            array(2025, 11, 1)
        );
    }
}
