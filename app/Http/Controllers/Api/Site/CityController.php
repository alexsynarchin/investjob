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

    public function getCities($region)
    {
        $cities = Region::where('parent_id', '!=', null) -> where('slug', $region) -> get();
        return $cities;
    }

    public function selectCity(Request $request, $slug)
    {
        $city = Region::where('parent_id', '!=', null) -> where('slug', $slug) -> firstOrFail();
        $city_data = [
                        'name' => $city->name,
                        'slug' => $city -> slug
                        ];
        Cookie::queue('city', json_encode($city_data), 10000);
        return $city_data;
    }


}
