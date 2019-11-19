<?php
namespace App\Http\Controllers;

use App\Services\Weather;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class WeatherController extends Controller
{
    public function weather(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lon' => 'numeric',
            'lat' => 'numeric',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $lon = $request->input('lon');
        $lat = $request->input('lat');

        // По-умолчанию Брянск
        if (empty($lon) || empty($lat)) {
            $lon = 34.36158636889649;
            $lat = 53.24475337945435;
        }

        $weather = Weather::getWeather($lon, $lat);
        //@todo убрать костыль, определять город по координатам
        $weather->setCity('г. Брянск');

        return view('weather', compact('weather'));
    }
}
