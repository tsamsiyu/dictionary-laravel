<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->all('/login', function (Request $request) {
//    echo 'hello world';
//    die;
//    return $request->user();
//});


Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users/self', 'UserController@self');
    Route::get('/jurisdictions', 'JurisdictionController@index');
    Route::post('/companies', 'CompanyController@store');
});