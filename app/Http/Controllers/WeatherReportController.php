<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherReport;



class WeatherReportController extends Controller
{
    public function get(Request $request){
        /**
         * get weather reports based on ids input
         */
         $ids = explode(',', $request->ids);

        try{
           return WeatherReport::getReports($ids);
        }catch(Exception $e){
            return 'error fetching reports';
        }
    }

    public function getStationReports($station_id){
        /**
         * get stations weather reports
         */
        try{    
            return WeatherReport::getStationReports($station_id);
        }catch(Exception $e){
            return 'error fetching station reports';
        }
    }

    public function create(Request $request){
        /**
         * create weather reports from json data
         */
        $inserted_report_ids = [];

        // get weather report json data
        $data = json_decode($request->getContent(), true);

        foreach($data as $weatherReport){
            try{
                $weatherReport = (object) $weatherReport;  
                $id =  WeatherReport::createReport($weatherReport);
                $inserted_report_ids[] = $id;
            }catch(Exception $e){
                return 'error creating reports';
            }
        }

        return $inserted_report_ids;
    }

    public function updateByPut(Request $request){
        /**
         * update weather reports from json data PUT METHOD
         */
        $putted_report_ids = [];

        // get weather report json data
        $data = json_decode($request->getContent(), true);
        
        foreach($data as $weatherReport){
            try{
                $weatherReport = (object) $weatherReport;
                // return var_dump($weatherReport->oid);  
                $id =  WeatherReport::putReports($weatherReport);
                $putted_report_ids[] = $id;
            }catch(Exception $e){
                return 'error updating PUT reports';
            }
        }

        return $putted_report_ids;
    }

    public function updateByPatch(Request $request){
        /**
         * update weather reports from json data PUT METHOD
         */
        $patched_report_ids = [];

        // get weather report json data
        $data = json_decode($request->getContent(), true);
        
        foreach($data as $weatherReport){
            try{
                $weatherReport = (object) $weatherReport;
                // return var_dump($weatherReport->oid);  
                $id =  WeatherReport::patchReports($weatherReport);
                $patched_report_ids[] = $id;
            }catch(Exception $e){
                return 'error updating PUT reports';
            }
        }

        return $patched_report_ids;
    }

    public function delete(Request $request){
        /**
         * delete weather reports from json data
         */
        $deleted_report_ids = [];

        // get weather report json data
        $data = json_decode($request->getContent(), true);

        foreach($data as $weatherReport){
            try{
                $weatherReport = (object) $weatherReport;  
                $id =  WeatherReport::deleteReports($weatherReport);
                $deleted_report_ids[] = $id;
            }catch(Exception $e){
                return 'error deleting reports';
            }
        }

        return $deleted_report_ids;
    }
}