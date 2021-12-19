<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;

class Services extends Controller
{
    //
    public function createChart(Request $request){

        $chartName = $request->get('chart');

        if(empty($chartName)){
            die("Cannot create empty chart");
        } else{
            Chart::create([
                'chart' => $chartName
            ]);
        }

    }
}
