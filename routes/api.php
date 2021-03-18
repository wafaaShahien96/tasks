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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Api'

], function ($router){

    Route::group(['prefix' => 'project'], function () {
        Route::get('products', 'MainController@products');
        Route::get('product/category', 'MainController@product_category');
        Route::get('name', 'MainController@name');
        Route::get('desc', 'MainController@desc');

    });
    });




