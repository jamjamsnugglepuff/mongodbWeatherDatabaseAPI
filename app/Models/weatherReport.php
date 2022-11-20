<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model;


class WeatherReport extends Model
{
    use HasFactory;
    protected $collection = 'weatherReports';

    public static function getReports($report_ids){
        # get weather reports that id in id
        return WeatherReport::whereIn('_id', $report_ids)->get();
    }

    public static function getStationReports($station_id){
        #get weather reports that station id = station id
        return WeatherReport::where('station', '=', $station_id)->get();
    }

    public static function createReport($weatherReport){
        #insertManyJsonData
        return WeatherReport::insertGetId([
            'date' => $weatherReport->date,
            'hr' => $weatherReport->hr,
            'prcp' => $weatherReport->prcp,
            'stp' => $weatherReport->stp,
            'smax' => $weatherReport->smax,
            'smin' => $weatherReport->smin,
            'gbrd' => $weatherReport->gbrd,
            'temp' => $weatherReport->temp,
            'dewp' =>   $weatherReport->dewp,
            'tmax' => $weatherReport->tmax,
            'tmin' => $weatherReport->tmin,
            'dmax' => $weatherReport->dmax,
            'dmin' => $weatherReport->dmin,
            'hmax' => $weatherReport->hmax,
            'hmin' => $weatherReport->hmin,
            'hmdy' => $weatherReport->hmdy,
            'wdct' => $weatherReport->wdct,
            'gust' => $weatherReport->gust,
            'wdsp' => $weatherReport->wdsp,
            'regions' => $weatherReport->regions,
            'prov' => $weatherReport->prov,
            'wsnm' => $weatherReport->wsnm,
            'inme' => $weatherReport->inme,
            'lat' => $weatherReport->lat,
            'lon' => $weatherReport->lon,
            'elvt' => $weatherReport->elvt
        ]);
    }

    public static function putReports($weatherReports){
        
    }

    public static function patchReports($weatherReports){

    }

    public static function deleteReports($report_ids){

    }
}