<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{

    // Predict Price of partment
    public function predict()
    {   
        $data = request()->validate([
            "housing_median_age" => "required|numeric|"
            ,
            "total_rooms" => "required|numeric"
            ,
            "total_bedrooms" => "required|numeric"
            ,
        ]);
        // Call predict API from Python  
        $response = Http::get('http://127.0.0.1:5000/predict',$data);
        $response = json_decode($response);
        return view('price.index' , compact("response"));
        
    }
}
