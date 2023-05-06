<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IRouteController
{

    /**
     * @OA\Get(
     *   path="/api/v1/routes",
     *   tags={"Routes"},
     *   summary="Listar Todas las rutas",
     *   description="Muestra todas las rutas en formato JSON",
     *   operationId="getAllRoutes",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function index(Request $request) : JsonResponse;

    /**
     * @OA\Get(
     *   path="/api/v1/routes/{route}/calendar",
     *   tags={"Routes"},
     *   summary="Listar los dias de la ruta",
     *   description="Muestra todos los dias de una ruta en formato JSON",
     *   operationId="getAllDaysByRoute",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function daysDataByRoute(Request $request , Route $route) : JsonResponse;

    public function show(int $id) : JsonResponse;

    public function store(Request $request) : JsonResponse;

    public function update(Request $request, Route $route) : JsonResponse;

    public function destroy(Route $route) : JsonResponse;


}
