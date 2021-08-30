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

Route::view('/', 'welcome');

Auth::routes();

Route::group(['middleware' => 'auth:web'], function () {

    Route::view('/home', 'home');
});

Route::get('logout', [LoginController::class,'logout']);
