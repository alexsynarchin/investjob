<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningCenterController extends Controller
{
    public function index()
    {
        return view('site.learning_center.index');
    }
}
