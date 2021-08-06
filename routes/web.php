<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Import\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.home.home');
})->name('home');
Route::post('/login', [LoginController::class, 'login']) -> name('auth.login');
Route::post('/logout', [LoginController::class, 'logout']) -> name('auth.logout');
Route::post('/register', [RegisterController::class,'register']) -> name('auth.register');
Route::get('/kabinet',[DashboardController::class, 'index']) ->name('dashboard.index');
Route::get('/import/test', [TestController::class, 'index'])->name('import.test');
Route::get('/import/rezume', [TestController::class,'rezume']) -> name('import.rezume');
Route::get('/import/work-places', [TestController::class,'otrasli']) -> name('import.otrasli');
Route::get('/import/users', [TestController::class, 'users']) ->name('import.users');
