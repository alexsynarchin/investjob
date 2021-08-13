<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Geo\Region;
use App\Services\Search\SearchService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete($type, Request $request)
    {
        $search =new SearchService();
        $data = ['type' => $type, 'search' => $request->get('search')];
        $result = $search -> autocomplete($data);
        return $result;
    }
}
