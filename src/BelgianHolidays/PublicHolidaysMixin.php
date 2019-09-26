<?php

namespace BelgianHolidays;

final class PublicHolidaysMixin
{
    /**
     * New Years Day
     *
     * @param null $year
     * @return \Closure
     */
    public function newYearsDay($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 1, 1);
        };
    }

    /**
     * Easter Monday
     *
     * @param null $year
     * @return \Closure
     */
    public function easterMonday($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 3, 21)
                ->addDays(easter_days($year))
                ->addDays(1);
        };
    }

    /**
     * Labour day
     *
     * @param null $year
     * @return \Closure
     */
    public function labourDay($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 5, 1);
        };
    }

    /**
     * Feast of the Ascension
     *
     * @param null $year
     * @return \Closure
     */
    public function feastOfTheAscension($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            $daysAfterEaster = 39;
            return static::createMidnightDate($year, 3, 21)
                ->addDays(easter_days($year))
                ->addDays($daysAfterEaster);
        };
    }

    /**
     * Pentecost Monday
     *
     * @param null $year
     * @return \Closure
     */
    public function pentecostMonday($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            $daysAfterEaster = 50;
            return static::createMidnightDate($year, 3, 21)
                ->addDays(easter_days($year))
                ->addDays($daysAfterEaster);
        };
    }

    /**
     * National Holiday
     *
     * @param null $year
     * @return \Closure
     */
    public function nationalHoliday($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 7, 21);
        };
    }

    /**
     * Assumption of Mary
     *
     * @param null $year
     * @return \Closure
     */
    public function assumptionOfMary($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 8, 15);
        };
    }

    /**
     * All Saints Day
     *
     * @param null $year
     * @return \Closure
     */
    public function allSaintsDay($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 11, 1);
        };
    }

    /**
     * Armistice Day
     *
     * @param null $year
     * @return \Closure
     */
    public function armisticeDay($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 11, 11);
        };
    }

    /**
     * Christmas
     *
     * @param null $year
     * @return \Closure
     */
    public function christmas($year = null)
    {
        return function ($year = null) {
            $year = is_null($year) ? static::now()->year : $year;
            return static::createMidnightDate($year, 12, 25);
        };
    }
}
