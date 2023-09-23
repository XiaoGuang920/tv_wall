<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

class Weather extends Model
{
    use HasFactory;

    public function getWeather($city) {
        $weather_info = array();

        if (isset($city) && $city) {
            $queryURL = 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-CA9D5A09-74BB-47B1-89D5-F82BFDA3ABCB&format=JSON&locationName=' . $city;
            $params = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                CURLOPT_URL => $queryURL
            );
            $curl = curl_init();
            curl_setopt_array($curl, $params);

            if ($result = curl_exec($curl)) {
                curl_close($curl);
                $response = json_decode($result, true);
                $city_weather = $response;
            } else {
                die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
            }

            $weather_info['parameter'] = $city_weather['records']['location']['0']['weatherElement']['0']['time']['0']['parameter']['parameterName'];
            $weather_info['rainy'] = $city_weather['records']['location']['0']['weatherElement']['1']['time']['0']['parameter']['parameterName'];
            $weather_info['min_tem'] = $city_weather['records']['location']['0']['weatherElement']['2']['time']['0']['parameter']['parameterName'];
            $weather_info['max_tem'] = $city_weather['records']['location']['0']['weatherElement']['4']['time']['0']['parameter']['parameterName'];
        }

        return $weather_info;
    }

    public function getUviAqi($city) {
        $uvi_and_aqi = array(
            'aqi_status' => '',
            'uv'         => ''
        );

        if (isset($city) && $city) {
            $queryURL = 'https://data.epa.gov.tw/api/v2/aqx_p_432?api_key=6ebb9978-cbd5-4ca8-b49a-66223a45aa09';
            $params = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                CURLOPT_URL => $queryURL
            );
            $curl = curl_init();
            curl_setopt_array($curl, $params);

            if ($result = curl_exec($curl)) {
                curl_close($curl);
                $air_response = json_decode($result, true);
                Log::debug($air_response);
            } else {
                die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
            }
            
            $queryURL = 'https://data.epa.gov.tw/api/v2/uv_s_01?api_key=6ebb9978-cbd5-4ca8-b49a-66223a45aa09';
            $params = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                CURLOPT_URL => $queryURL
            );
            $curl = curl_init();
            curl_setopt_array($curl, $params);

            if ($result = curl_exec($curl)) {
                curl_close($curl);
                $uv_response = json_decode($result, true);
            } else {
                die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
            }
            
            if (isset($air_response['records']['59']['status'])) {
                $uvi_and_aqi['aqi_status'] = $air_response['records']['59']['status'];
            }
            if (isset($uv_response['records']['10']['uvi'])) {
                $uvi_and_aqi['uv'] = $uv_response['records']['10']['uvi'];
            }            
        }

        return $uvi_and_aqi;
    }
}
