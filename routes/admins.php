<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace'=> 'Auth'], function () {
    Route::get('/login', [LoginController::class,'showAdminLoginForm'])->name('admin.login.form');
    Route::post('/login', [LoginController::class,'adminLogin'])->name('admin.login');
    Route::post('/logout', [LoginController::class,'logout'])->name('admin.logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/', 'admin/dashboard')->name('admin.dashboard');
});
