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

    public static function putReports($weatherReport){
        $report_to_update =  WeatherReport::where('_id', $weatherReport->oid)->first();
        
        foreach (get_object_vars($weatherReport) as $key => $value) {
            $report_to_update->$key = $value;
        }

        $report_to_update->save();

        return $report_to_update->oid;
    }

    public static function patchReports($weatherReport){
        $report_to_update =  WeatherReport::where('_id', $weatherReport->oid)->first();
        
        foreach (get_object_vars($weatherReport) as $key => $value) {
            $report_to_update->$key = $value;
        }

        $report_to_update->save();

        return $report_to_update->oid;
    }

    public static function deleteReports($weatherReport){
        WeatherReport::where('_id', $weatherReport->oid)->first()->delete();
    }
}