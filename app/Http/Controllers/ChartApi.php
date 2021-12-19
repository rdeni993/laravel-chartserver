<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use App\Models\Price;
use App\Models\User;

class ChartApi extends Controller
{
    //
    public function get($chart){
        return Price::where('chart', $chart)->get();
    }

    public function getWhere($chart, $from, $to){
        return Price::where('chart', $chart)
                        ->whereBetween('price_date', [$from, $to])
                        ->get();
    }

}
