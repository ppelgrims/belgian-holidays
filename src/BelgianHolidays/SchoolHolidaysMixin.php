<?php

namespace BelgianHolidays;

use Carbon\Carbon;

final class SchoolHolidaysMixin
{
    /**
     * @param null $year
     * @return \Closure
     */
    public function springHolidays($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? Carbon::now()->year : $year;
            $easterMonday = Carbon::createMidnightDate($year, 3, 21)
                ->addDays(easter_days($year))
                ->addDays(1);
            $weeksBeforeEaster = 7;
            $startsAt = $easterMonday->copy()->subWeeks($weeksBeforeEaster);
            $endsAt = $startsAt->copy()->addWeeks(1)->subDays(1);
            return static::create($startsAt, $endsAt);
        };
    }

    /**
     * @param null $year
     * @return \Closure
     */
    public function easterHolidays($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? Carbon::now()->year : $year;
            $easter = Carbon::createMidnightDate($year, 3, 21)
                ->addDays(easter_days($year));
            $easterMonday = $easter->copy()->addDays(1);

            $march = 3;
            if ($easter->format('n') === $march) {
                $startsAt = $easterMonday->copy();
                $endsAt = $startsAt->copy()->addDays(13);
                return static::create($startsAt, $endsAt);
            }

            $april15 = Carbon::createMidnightDate($year, 4, 15);
            if ($easter > $april15) {
                $startsAt = $easterMonday->copy()->subWeeks('2');
                $endsAt = $easterMonday->copy();
                return static::create($startsAt, $endsAt);
            }

            $startsAt = Carbon::parse(sprintf('first monday of april %s', $year));
            $endsAt = $startsAt->copy()->addDays(13);
            return static::create($startsAt, $endsAt);
        };
    }

    /**
     * @param null $year
     * @return \Closure
     */
    public function summerHolidays($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? Carbon::now()->year : $year;
            return static::create(
                Carbon::createMidnightDate($year, 7, 1),
                Carbon::createMidnightDate($year, 8, 31)
            );
        };
    }

    /**
     * @param null $year
     * @return \Closure
     */
    public function autumnHolidays($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? Carbon::now()->year : $year;
            $novemberFirst = Carbon::createMidnightDate($year, 11, 1);

            if ($novemberFirst->format('l') == 'Sunday') {
                $startsAt = $novemberFirst->copy()->addDays(1);
                return static::create($startsAt, $startsAt->copy()->addDays(6));
            }

            if ($novemberFirst->format('l') == 'Monday') {
                $startsAt = $novemberFirst->copy();
                return static::create($startsAt, $startsAt->copy()->addDays(6));
            }

            $startsAt = $novemberFirst->copy()->modify('previous monday');
            return static::create($startsAt, $startsAt->copy()->addDays(6));
        };
    }

    /**
     * @param null $year
     * @return \Closure
     */
    public function christmasHolidays($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? Carbon::now()->year : $year;
            $christmas = Carbon::createMidnightDate($year, 12, 25);

            if (in_array($christmas->format('l'), ['Saturday', 'Sunday'])) {
                $startsAt = $christmas->modify('next monday');
                return static::create($startsAt, $startsAt->copy()->addDays(13));
            }

            if ($christmas->format('l') == 'Monday') {
                return static::create($christmas->copy(), $christmas->copy()->addDays(13));
            }

            $startsAt = $christmas->copy()->modify('previous monday');
            return static::create($startsAt, $startsAt->copy()->addDays(13));
        };
    }
}
