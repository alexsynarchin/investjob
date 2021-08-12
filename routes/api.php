<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Social Auth
use App\Http\Controllers\Auth\SocialController;
Route::get('/social-auth/{provider}', [SocialController::class,'redirectToProvider'])->name('auth.social');
Route::get('/social-auth/{provider}/callback', [SocialController::class,'handleProviderCallback'])->name('auth.social.callback');

//Regions
use App\Http\Controllers\Api\Site\CityController;
Route::get('/regions-list', [CityController::class,'getRegions'])->name('regions-list');

//Import
use App\Http\Controllers\Api\Site\SiteController;
Route::get('/import',[SiteController::class,'import'])->name('test.import');

