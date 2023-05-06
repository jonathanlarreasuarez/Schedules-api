<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Contracts\ICalendarController;
use App\Http\Controllers\Controller;
use App\Repositories\CalendarRepository;
use App\Services\CalendarDayService;
use App\Services\RouteCalendarService;
use App\Traits\RestResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CalendarDateRequest;

class CalendarController extends Controller implements ICalendarController
{
    use RestResponse;

    /**
     * @var CalendarDayService
     */
    private $calendarDayService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CalendarDayService $calendarDayService)
    {
        $this->calendarDayService = $calendarDayService;
    }

    /**
     *
     * This method is used to get the days calendar by range of dates
     *
     * @param CalendarDateRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function getCalendarDaysByDate(CalendarDateRequest $request) : JsonResponse
    {
        return $this->success(
            $this->calendarDayService->getCalendarDaysByDate($request)
        );
    }

}
