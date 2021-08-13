<?php

namespace App\Services\Search;

use App\Services\Helpers\GetModelService;

class SearchService
{

    public function autocomplete($data)
    {
        $model = (new GetModelService()) -> getModel($data['type']);
        if($data['type'] === 'regions') {
            $search_items = $model::where('parent_id', '!=', null) ->  where('name', 'like', '%' . $data['search'] . '%') ->get();
        } else {
            $search_items = $model::where('name', 'like', '%' . $data['search'] . '%') ->get();
        }
        return $search_items;
    }
}
