<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherReportController;
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




Route::middleware('auth:api')->group(function(){
    // get a weather report
    Route::get('/weather_report', [WeatherReportController::class, 'get']);
    // get weather reports of station id
    Route::get('/weather_report/station/{id}', [WeatherReportController::class, 'getStationReports']);
    // create a weather report
    Route::post('/weather_report/create', [WeatherReportController::class, 'create']);
    // PUT update weather report
    Route::put('/weather_report/update', [WeatherReportController::class, 'updateByPut']);
    // PATCH update weather report
    Route::patch('/weather_report/update', [WeatherReportController::class, 'updateByPatch']);
    // DELETE weather report
    Route::delete('/weather_report/delete', [WeatherReportController::class, 'delete']);
});


