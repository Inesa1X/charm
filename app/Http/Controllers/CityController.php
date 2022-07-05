<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    public function salonsOfCity($cityTitle) {

        $town = City::where('title', '=', $cityTitle)->first();
        return view('salons', ['town' => $town]);
    }
}
