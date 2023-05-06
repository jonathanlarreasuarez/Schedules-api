<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\CalendarDateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ICalendarController
{
    /**
     * @OA\Get(
     *   path="/api/v1/calendar-dates",
     *   tags={"Calendar"},
     *   summary="Listar los dias de un calendario por rangos de fechas",
     *   description="Muestra todos los dias de un calendario por rangos de fechas en formato JSON",
     *   operationId="getAllDaysByCalendar",
     *   @OA\Parameter(
     *     name="start_date",
     *     description="Fecha de inicio",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="date",
     *       example="2021-01-01"
     *     ),
     *   ),
     *    @OA\Parameter(
     *     name="end_date",
     *     description="Fecha de fin",
     *     in="path",
     *     required=false,
     *     @OA\Schema(
     *       type="date",
     *       example="2021-01-31"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function getCalendarDaysByDate(CalendarDateRequest $request): JsonResponse;
}
