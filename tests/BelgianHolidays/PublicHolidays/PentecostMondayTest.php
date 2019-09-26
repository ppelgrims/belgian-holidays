<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class PentecostMondayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isPentecostMonday($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $pentecostMonday = Carbon::pentecostMonday($year);
        $this->assertTrue($date->eq($pentecostMonday));
        $this->assertEquals('Monday', $pentecostMonday->format('l'));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 5, 21),
            array(2019, 6, 10),
            array(2020, 6, 1),
            array(2025, 6, 9)
        );
    }
}
