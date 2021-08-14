<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function import()
    {
        $text = "Импорт данных тип инфоблока: Вакансии и резюме. Инфоблок: Справочник компаний";
        return $text;
    }
}
