<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

    }
    public function professional_standards()
    {
        return view('site.inner.inner');
    }
    public function about()
    {
        return view('site.inner.inner');
    }
    public function oprof()
    {
        return view('site.inner.inner');
    }
    public function contact()
    {
        return view('site.inner.inner');
    }
}
