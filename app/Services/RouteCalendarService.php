<?php

namespace App\Services;

use App\Repositories\RouteRepository;
use App\Traits\DateFormatTrait;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 *
 */
class RouteCalendarService
{

    use DateFormatTrait;

    /**
     * @var RouteRepository
     */
    private $routeRepository;

    public function __construct(RouteRepository $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    /**
     * @throws Exception
     */
    public function getDaysDataCalendarByRoute($id): array
    {
        $daysInFrequency = $daysOutFrequency = $daysReserved = $daysDisabled = [];

        $routes = $this->routeRepository->routeCalendarDays($id);
        if ($routes->routeData()->exists() === false) {
            throw new ValidationException('Route data not found');
        }

        $daysInFrequency = $this->getDaysByFrequency($routes->routeData, true);
        $daysOutFrequency = $this->getDaysByFrequency($routes->routeData, false);

        if ($routes->reservations()->exists() === true) {
            $daysReserved = $this->getDaysReserved($routes->reservations);
        }

        if ($routes->routeData->calendar->calendarDisabledDays()->exists() === true) {
            $daysDisabled = $this->getDaysDisables($routes->routeData->calendar->calendarDisabledDays);
        }

        $datesRouteData = $this->getDatesRouteData($routes->routeData);

        return [
            'days_in_frequency' => $daysInFrequency,
            'days_out_frequency' => $daysOutFrequency,
            'days_reserved' => $daysReserved,
            'days_disabled' => $daysDisabled,
            'route_capacity' => [$datesRouteData['init_date'], $datesRouteData['finish_date']],
        ];
    }

    /**
     * @throws Exception
     */
    public function getDaysDisables($calendarDisabledDays): array
    {
        $daysDisabled = [];
        foreach ($calendarDisabledDays as $calendarDisabledDay) {
            $dateFormat = $calendarDisabledDay->day;
            $daysDisabled[] = $dateFormat;
        }
        return array_unique($daysDisabled);
    }

    /**
     * @param $routeData
     * @return array
     */
    public function getDatesRouteData($routeData): array
    {
        $initDateRoute = collect($routeData->date_init)->first();
        $finishDateRoute = collect($routeData->date_finish)->first();

        return [
            'init_date' => $initDateRoute,
            'finish_date' => $finishDateRoute,
        ];
    }

    /**
     * @throws Exception
     */
    public function getDaysByFrequency($routeData, bool $inFrequency): array
    {
        $datesRouteData = $this->getDatesRouteData($routeData);
        $initDateRoute = $datesRouteData['init_date'];
        $finishDateRoute = $datesRouteData['finish_date'];

        $datesInRange = [];
        $daysKeywordInFrequency = collect($routeData)->filter(function ($value, $key) use ($inFrequency) {
            if ((int)$value === (int)$inFrequency && in_array($key, $this->daysWeedFormat, true)) {
                return $key;
            }
            return false;
        });

        $daysFormatName = $this->getNameDaysByKeyword($daysKeywordInFrequency,$initDateRoute, $finishDateRoute );
        return $this->getSpecificDaysBetweenDates($initDateRoute, $finishDateRoute, $daysFormatName);
    }

    /**
     * @throws Exception
     */
    public function getDaysReserved($reservations): array
    {
        $daysReserved = [];
        foreach ($reservations as $reservation) {
            $daysReserved[] = $reservation->reservation_start;
            $daysReserved[] = $reservation->reservation_end;
        }

        //This method is used in case that the reservation is for more than one day
        /*$dateMin = min($daysReserved);
        $dateMax = max($daysReserved);
        return $this->getDaysBetweenDates($dateMin, $dateMax);*/

        return $daysReserved;
    }

}
