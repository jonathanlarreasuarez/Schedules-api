<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Contracts\IRouteController;
use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Repositories\RouteRepository;
use App\Services\RouteCalendarService;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RouteController extends Controller implements IRouteController
{

    use RestResponse;

    /**
     * @var RouteRepository
     */
    private $routeRepository;
    /**
     * @var RouteCalendarService
     */
    private $routeCalendarService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(RouteRepository $routeRepository, RouteCalendarService $routeCalendarService)
    {
        $this->routeRepository = $routeRepository;
        $this->routeCalendarService = $routeCalendarService;
    }

    /**
     * index
     *
     * @return void
     */
    public function index(Request $request): JsonResponse
    {
        $routes = $this->routeRepository->all($request);
        return $this->success(
            $routes
        );
    }

    /**
     * @throws Exception
     */
    public function daysDataByRoute(Request $request, Route $route): JsonResponse
    {
        return $this->success(
            $this->routeCalendarService->getDaysDataCalendarByRoute($route->id)
        );
    }

    /**
     * show
     *
     * @param mixed $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $route = $this->routeRepository->find($id);
        return $this->success(
            $route
        );
    }

    /**
     * store
     *
     * @param mixed $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $route = new Route($request->all());
        $response = $this->routeRepository->save($route);
        return $this->success(
            $response
        );
    }

    /**
     * update
     *
     * @param mixed $request
     * @param Route $route
     * @return JsonResponse
     */
    public function update(Request $request, Route $route): JsonResponse
    {
        $route->fill($request->all());

        if ($route->isClean()) {
            return $this->sendError('No se detectaron cambios.');
        }

        $response = $this->routeRepository->save($route);
        return $this->success(
            $response
        );
    }

    /**
     * destroy
     *
     * @param mixed $route
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Route $route): JsonResponse
    {
        $response = $this->routeRepository->destroy($route);
        return $this->success(
            $response
        );
    }

}
