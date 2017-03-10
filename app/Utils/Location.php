<?php

namespace App\Utils;

use App\Utils\Models\Province;
use App\Utils\Models\City;
use App\Utils\Models\District;

class Location
{
    public static function provinces()
    {
        return Province::all();
    }

    public function cities($province_id)
    {
        return City::where('province_id', $province_id)->get();
    }

    public function districts($city_id)
    {
        return District::where('city_id', $city_id);
    }

    
}
