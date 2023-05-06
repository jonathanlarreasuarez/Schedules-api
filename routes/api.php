<?php

use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('routes', RouteController::class);
Route::prefix('v1')->group(function () {
    Route::get('/routes', [RouteController::class, 'index']);
    Route::get('/routes/{route}/calendar', [RouteController::class, 'daysDataByRoute']);
    Route::get('/calendar-dates', [CalendarController::class, 'getCalendarDaysByDate']);
});


