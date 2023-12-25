<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class UtilitiesController extends Controller
{
    public static function FormatDatetime($data)
    {
        foreach ($data as $item) {
            // $date=$item->created_at;
            // $date=Carbon::parse($date);
            // $date=$date->startOfDay(); 
            // $date = $date->format('d-m-Y');
            // $item['created_at']=$date;
        //     
        // $date = Carbon::parse($item['created_at']);
        // $item['created_at'] = $date->toDateString();
        $date = $item->created_at->format('d-m-Y');
        $item['created_at']=$date;
        }
        return $data;
    }
}
