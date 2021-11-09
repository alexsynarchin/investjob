<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{

    public function index()
    {
        //if (Request::ajax()) return compact($object1, $object2);
        //else return view('template', compact($object, $object2));
        if (request()->ajax()) {
            $pages = Page::all();
            return $pages;
        } else {
            return view('admin.static-page.index');
        }
    }

    public function store(StaticPageRequest $request)
    {
        $request->validated();
        $staticPage = Page::create($request->except('seo','content'));
        $staticPage -> seo() -> create();
        return $staticPage;
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
