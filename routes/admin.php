<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
|
*/

use App\Http\Controllers\Admin\AdminController;
Route::get('/', [AdminController::class, 'home']) -> name('home');

use App\Http\Controllers\Admin\StaticPageController;
Route::apiResource('/static-pages', StaticPageController::class);
