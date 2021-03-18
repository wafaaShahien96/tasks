<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function() {

Route::resource('roles','RoleController');

Route::resource('users','UserController');
Route::resource('categories' , 'Dashboard\CategoryController');
Route::resource('products' , 'Dashboard\ProductController');
Route::resource('tags' , 'Dashboard\tagController');

Route::get('/{page}', 'AdminController@index');
    });
    });


    // Route::get('/', function () {
    //     return view('welcome');
    // });
