<?php

namespace Tests\BelgianHolidays\PublicHolidays;

use Carbon\Carbon;
use Tests\BaseTest;

final class EasterMondayTest extends BaseTest
{
    /**
     * @test
     * @dataProvider dates
     * @param $year
     * @param $month
     * @param $date
     */
    public function isEasterMonday($year, $month, $date)
    {
        $date = Carbon::createMidnightDate($year, $month, $date);
        $easterMonday = Carbon::easterMonday($year);
        $this->assertTrue($date->eq($easterMonday));
        $this->assertEquals('Monday', $easterMonday->format('l'));
    }

    /**
     * @return array
     */
    public function dates()
    {
        return array(
            array(2018, 4, 2),
            array(2019, 4, 22),
            array(2020, 4, 13),
            array(2025, 4, 21)
        );
    }
}
