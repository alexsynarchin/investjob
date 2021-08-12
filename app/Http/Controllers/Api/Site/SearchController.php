<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Geo\Region;
use App\Services\Search\SearchService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $search= $request->get('search');
        $cities = Region::where('parent_id', '!=', null) -> where('name', 'like', '%' . $search . '%') ->get();
        return $cities;
    }
}
