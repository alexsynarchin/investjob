<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Geo\Region;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getRegions()
    {
        $regions = Region::where('parent_id', null) -> get();
        return $regions;
    }

    public function getCities($id)
    {
        $cities = Region::where('parent_id', $id) -> get();
        return $cities;
    }

    public function selectCity(Request $request, $id)
    {
        $city = Region::findOrFail($id);
        $city_data = [
                        'name' => $city->name,
                        'slug' => $city -> slug,
                        'id' =>   $city->id,
                        ];
        Cookie::queue('city', json_encode($city_data), 10000);
        return $city_data;
    }


}
