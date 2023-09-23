<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Weather as ModelsWeather;

class HomeController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Catalog\HeaderController')->index();
        $footer = app('App\Http\Controllers\Catalog\FooterController')->index();;

        return view('Catalog.home.index', [
            'header' => $header,
            'footer' => $footer
        ]);
    }

    public function getWeather(Request $request) {
        $resp = array(
			'weather_detail' => null,
			'validate' => false
		);
		
		if ($request->input('city')) {
			$city = $request->input('city');
		} else {
			$city = null;
		}

        if ($city) {
            $model_home = new ModelsWeather();

            $resp['weather_detail'] = $model_home->getWeather($city);
            $resp['validate'] = true;
        }
		
		return response()->json($resp);
    }

    public function getUviAqi(Request $request) {
        $resp = array(
			'uvi_and_aqi' => null,
			'validate' => false
		);
		
        if ($request->input('city')) {
			$city = $request->input('city');
		} else {
			$city = null;
		}
        
        if ($city) {
            $model_home = new ModelsWeather();

            $resp['uvi_and_aqi'] = $model_home->getUviAqi($city);
            $resp['validate'] = true;
        }
		
		return response()->json($resp);
    }
}
