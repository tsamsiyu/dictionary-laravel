<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Frontend'], function () {
    Route::get('/dicta', 'DictaController@search');
    Route::post('/dicta', 'DictaController@create');

    Route::get('/users/self', 'UserController@self');
});
