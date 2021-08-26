<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/supervisor', [LoginController::class,'showSupervisorLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/supervisor', [RegisterController::class,'showSupervisorRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/supervisor', [LoginController::class,'supervisorLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/supervisor', [RegisterController::class,'createSupervisor']);

Route::group(['middleware' => 'auth:supervisor'], function () {
    Route::view('/supervisor', 'supervisor');
});

Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/admin', 'admin');
});
Route::group(['middleware' => 'auth:web'], function () {

    Route::view('/home', 'home');
});

Route::get('logout', [LoginController::class,'logout']);
