<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Geo\Region;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getRegions()
    {
        $regions = Region::where('parent_id', null) -> get();
        return $regions;
    }
}
