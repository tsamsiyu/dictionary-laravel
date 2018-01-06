<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Frontend'], function () {
    Route::get('/dicta', 'DictaController@search');
    Route::post('/dicta', 'DictaController@create');
    Route::put('/dicta/{dictum}', 'DictaController@update');
    Route::delete('/dicta/{dictum}', 'DictaController@destroy');

    Route::get('/users/self', 'UserController@self');
});
