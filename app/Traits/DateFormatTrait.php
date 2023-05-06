<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;

trait DateFormatTrait
{

    private $daysWeedName = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    private $daysWeedFormat = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

    public function getNameDaysByKeyword(Collection $daysKeywords, $startDate , $endDate): array
    {
        return $daysKeywords->map(function ($value, $key) use ($startDate, $endDate) {
            return $this->daysWeedName[array_search($key, $this->daysWeedFormat, true)];
        })->toArray();
    }

    /**
     * @throws Exception
     */
    public function changeFormatDateString(string $date): string
    {
        return (new \DateTime($date))->format('Y-m-d');
    }

    /**
     * @throws Exception
     */
    public function getDaysBetweenDates(string $dateInit, string $dateFinish): array
    {
        $daysInRange = [];
        $begin = new \DateTime($dateInit);
        $end = new \DateTime($dateFinish);
        $end = $end->modify('+1 day');
        $interval = new \DateInterval('P1D');
        $dateRange = new \DatePeriod($begin, $interval, $end);
        foreach ($dateRange as $date) {
            $daysInRange[] = $date->format("Y-m-d");
        }
        return $daysInRange;
    }

    /**
     * @throws Exception
     */
    public function getSpecificDaysBetweenDates(string $dateInit, string $dateFinish, array $days) : array
    {
        $specificDaysInRange = [];
        $begin = new \DateTime($dateInit);
        $end = new \DateTime($dateFinish);
        $end = $end->modify('+1 day');
        $interval = new \DateInterval('P1D');
        $dateRange = new \DatePeriod($begin, $interval, $end);
        foreach ($dateRange as $date) {
            if(in_array($date->format("l"), $days, true)){
                $specificDaysInRange[] = $date->format("Y-m-d 00:00:00");
            }
        }
        return $specificDaysInRange;
    }

}
