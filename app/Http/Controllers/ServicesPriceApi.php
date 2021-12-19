<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Modes\Chart;

class ServicesPriceApi extends Controller
{
    //
    public function create(Request $request){
        $priceData = $request->validate([
            'price' => 'required',
            'chart' => 'required|gt:0',
            'price_date' => 'required'
        ]);

        return Price::create($priceData);
    }

    public function update(Request $request){
        $putsData = $request->get('puts');
        $errors = false;

        foreach( $putsData as $put ){

            $updateId = $put['pid'];
            $updatePrice = $put['price'];

            try{
                if(!Price::where('id', $updateId)->update(['price' => $updatePrice])){
                    throw new Exception("Update Not Successfull");
                }
            } catch(Exception $e){
                $errors = true;
            }

        }

        return (!$errors) ? 
                response(['message' => 'Prices are upadated'], 200) :
                response(['message' => 'Prices are not updated', 500]);

    }

    public function search(Request $request, $date, $chart){
        $resp = Price::where('price_date', $date)
                        ->where('chart', $chart)
                        ->first();
        return response($resp, 200);
    }

}
