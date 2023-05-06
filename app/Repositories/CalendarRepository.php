<?php

namespace App\Repositories;

use App\Models\Calendar;
use App\Models\CalendarDayDisable;
use App\Models\Reservation;
use App\Models\Route;
use App\Models\RouteData;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CalendarRepository extends BaseRepository
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Calendar $calendar)
    {
        parent::__construct($calendar);
    }

    /**
     * @param bool $inFrequency
     * @param $startDate
     * @param $endDate
     * @return Collection
     */
    public function getCalendarDayFrequencyByDate(bool $inFrequency, $startDate, $endDate = null) : Collection
    {
        $daysRange = RouteData::select('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun')
            ->where('date_init', '>=', $startDate)
            ->when($endDate, function ($query, $endDate) {
                return $query->where('date_init', '<=', $endDate);
            })
            ->get();

        return $daysRange->map(function ($value, $key) use ($inFrequency) {
            return collect($value)->filter(function ($value, $key) use ($inFrequency) {
                if((int)$value === (int) $inFrequency) {
                    return $key;
                }
                return false;
            })->keys();
        })->flatten();
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return mixed
     */
    public function getCalendarDaysReservedByDate($startDate, $endDate = null)
    {
        return Reservation::select('reservation_start')
            ->where('reservation_start', '>=', $startDate)
            ->when($endDate, function ($query, $endDate) {
                return $query->where('reservation_start', '<=', $endDate);
            })
            ->get()
            ->pluck('reservation_start')
            ->toArray();
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return mixed
     */
    public function getCalendarDaysDisabledByDate($startDate, $endDate = null)
    {
        return CalendarDayDisable::select('day')
            ->where('day', '>=', $startDate)
            ->when($endDate, function ($query, $endDate) {
                return $query->where('day', '<=', $endDate);
            })
            ->get()
            ->pluck('day')
            ->toArray();
    }
}
