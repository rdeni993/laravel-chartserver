<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;

class ServicesGraphApi extends Controller
{
    // Create
    public function create(Request $request){
        $chart = $request->validate([
            'chart' => 'required'
        ]);

        return Chart::create($chart);
    }

    // Select
    public function select(){
        return Chart::all();
    }

    // Remove
    public function delete(Request $request){
        $deleteData = $request->validate([
            'chart' => 'required'
        ]);

        return Chart::where('id', $deleteData['chart'])->delete();
    }
}
