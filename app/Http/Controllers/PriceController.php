<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use App\Models\Price;

class PriceController extends Controller
{
    public function index(Request $request){
        // Get Number of prices
        $allPriceRecords = Price::all()->count();
        $allPrice = Price::select([
            'prices.id as pid',
            'prices.price', 
            'prices.chart', 
            'prices.price_date', 
            'chart.chart', 
            'chart.id as chtid'])->join('chart', 'prices.chart', '=', 'chart.id')->paginate(50);

        $allCharts = Chart::all();


        return view('price_show', [
            'count' => $allPriceRecords,
            'data'  => json_encode($allPrice),
            'i'     => 1,
            'page'  => $request->get('page'),
            'charts'=> $allCharts
        ]);
    }
    public function indexGraph(Request $request, $graph){
        // Get Number of prices
        $allPriceRecords = Price::all()->count();
        $allPrice = Price::select([
            'prices.id as pid',
            'prices.price', 
            'prices.chart', 
            'prices.price_date', 
            'chart.chart', 
            'chart.id as chtid'])->join('chart', 'prices.chart', '=', 'chart.id')->where('prices.chart', $graph)->paginate(50);

        $allCharts = Chart::all();


        return view('price_show', [
            'count' => $allPriceRecords,
            'data'  => json_encode($allPrice),
            'i'     => 1,
            'page'  => $request->get('page'),
            'charts'=> $allCharts,
            'graph_id' => $graph
        ]);
    }

    public function search(Request $request){
        // Get Number of prices
        $allPriceRecords = Price::all()->count();
        $allPrice = Price::select([
            'prices.id as pid',
            'prices.price', 
            'prices.chart', 
            'prices.price_date', 
            'chart.chart', 
            'chart.id as chtid'])->join('chart', 'prices.chart', '=', 'chart.id')->paginate(50);

        $allCharts = Chart::all();


        return view('search_price', [
            'count' => $allPriceRecords,
            'data'  => json_encode($allPrice),
            'i'     => 1,
            'page'  => $request->get('page'),
            'charts'=> $allCharts
        ]);
    }
    //
    public function create(){
        $charts = Chart::all();

        return view('prices', [
            'charts' => $charts
        ]);
    }
}
