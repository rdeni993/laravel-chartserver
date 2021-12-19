<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;

class GraphController extends Controller
{
    // Show Charts
    public function index(){
        // Select graphs
        $graphs = Chart::all();

        // Return Graphicons
        return view('graphs', [
            'graphs' => json_encode($graphs)
        ]);
    }
}
