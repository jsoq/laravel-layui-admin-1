<?php

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

Route::get('/', 'Admin\ViewController@login')->name('admin.login')->middleware('guest');
Route::post('admin/api/user/login', 'Admin\UserController@login')->name('api.admin.user.login');

Route::prefix('admin')->namespace('Admin')->middleware('auth:web')->group(function () {
    Route::get('home', 'ViewController@home')->name('admin.home');
    Route::get('config/base', 'ViewController@baseConfig')->name('admin.config.base');
});
Route::prefix('admin/api')->namespace('Admin')->middleware('auth:web')->group(function () {
    Route::post('user/logout', 'UserController@logout')->name('api.admin.user.logout');
    Route::post('config/baseConfig/edit', 'ConfigController@editBaseConfig')->name('api.admin.config.editBaseConfig');
});
