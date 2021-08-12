<?php

namespace App\Services\Helpers;

class GetModelService
{
    public $models = [
        'regions' => \App\Models\GeO\Region::class,
        'resumes' => \App\Models\Resume\Resume::class,
    ];
    public function getModel($model)
    {
        $class = $this->models[$model];
        $model = new $class;
        return $model;
    }
}
