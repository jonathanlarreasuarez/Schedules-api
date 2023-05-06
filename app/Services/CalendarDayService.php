<?php

namespace App\Services;

use App\Http\Requests\CalendarDateRequest;
use App\Repositories\CalendarRepository;
use App\Traits\DateFormatTrait;
use Exception;
use Illuminate\Support\Collection;

class CalendarDayService
{

    use DateFormatTrait;

    /**
     * @var CalendarRepository
     */
    private $calendarRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CalendarRepository $calendarRepository)
    {
        $this->calendarRepository = $calendarRepository;
    }

    /**
     * @param CalendarDateRequest $request
     * @return array
     * @throws Exception
     */
    public function getCalendarDaysByDate(CalendarDateRequest $request): array
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $daysInFrequencyDayKeyword = $this->calendarRepository->getCalendarDayFrequencyByDate(true, $startDate, $endDate);
        $daysInFrequency = $this->getDatesByDayRange($daysInFrequencyDayKeyword->flip(), $startDate, $endDate);
        $daysOutFrequencyDayKeyword = $this->calendarRepository->getCalendarDayFrequencyByDate(false, $startDate, $endDate);
        $daysOutFrequencyDate = $this->getDatesByDayRange($daysOutFrequencyDayKeyword, $startDate, $endDate);

        $daysReserved = $this->calendarRepository->getCalendarDaysReservedByDate($startDate, $endDate);
        $daysDisabled = $this->calendarRepository->getCalendarDaysDisabledByDate($startDate, $endDate);

        return [
            'days_in_frequency' => $daysInFrequency,
            'days_out_frequency' => $daysOutFrequencyDate,
            'days_reserved' => $daysReserved,
            'days_disabled' => $daysDisabled,
            'route_capacity' => [$startDate, $endDate],
        ];
    }

    /**
     * @throws Exception
     */
    public function getDatesByDayRange(Collection $daysOutFrequencyDays, $startDate, $endDate = null) : array
    {
        if($endDate === null){
            $endDate = date('Y-m-d', strtotime($startDate . ' +1 month'));
        }
        $daysFormatName = $this->getNameDaysByKeyword($daysOutFrequencyDays,$startDate, $endDate );
        return $this->getSpecificDaysBetweenDates($startDate, $endDate, $daysFormatName);

    }
}
