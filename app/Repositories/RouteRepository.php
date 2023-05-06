<?php

namespace App\Repositories;

use App\Models\Route;

class RouteRepository extends BaseRepository
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Route $route)
    {
        parent::__construct($route);
    }

    public function routeCalendarDays($id)
    {
        return $this->model->with('routeData.calendar.calendarDisabledDays')
            ->with('reservations')
            ->find($id);
    }


}
