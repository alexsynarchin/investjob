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
    return view('site');
})->name('home');

//Auth
Route::post('/login', [LoginController::class, 'login']) -> name('auth.login');
Route::post('/logout', [LoginController::class, 'logout']) -> name('auth.logout');
Route::post('/register', [RegisterController::class,'register']) -> name('auth.register');
Route::post('/auth/select-user-type', [RegisterController::class,'selectUserType']) ->middleware('auth') ->name('auth.select.type');

//Admin login
use App\Http\Controllers\Auth\AdminLoginController;
Route::get('/admin/login', [AdminLoginController::class, 'login']) ->middleware('admin-guest') -> name('admin.loginPage');
Route::post('/admin/login', [AdminLoginController::class, 'handleLogin']) -> name('admin.handleLogin');

//Personal
Route::get('/kabinet',[DashboardController::class, 'index']) ->name('dashboard.index');


Route::get('/import/test', [TestController::class, 'index'])->name('import.test');
Route::get('/import/rezume', [TestController::class,'rezume']) -> name('import.rezume');
Route::get('/import/work-places', [TestController::class,'otrasli']) -> name('import.otrasli');
Route::get('/import/users', [TestController::class, 'users']) ->name('import.users');

//Site
use App\Http\Controllers\Site\SiteController;

//profstandarty
Route::get('/profstandarty' , [SiteController::class, 'professional_standards']) ->name('professional_standards');

//about
Route::get('/about', [SiteController::class, 'about']) -> name('about');


//contact
Route::get('/kontakt-info', [SiteController::class, 'contact']) -> name('contact');

//resume
use App\Http\Controllers\Site\ResumeController;
Route::get('/podbor_personala',[ResumeController::class, 'index']) -> name('site.resume.index');

//vacancy
use App\Http\Controllers\Site\VacancyController;
Route::get('/rabota',[VacancyController::class, 'index']);

//uslugi
use App\Http\Controllers\Site\ServiceController;
Route::get('/uslugi', [ServiceController::class, 'index']);

//kompanii
use App\Http\Controllers\Site\CompanyController;
Route::get('/kompanii', [CompanyController::class, 'index']);

//uchebnye-tsentry
use App\Http\Controllers\Site\LearningCenterController;
Route::get('/uchebnye-tsentry', [LearningCenterController::class, 'index']);




