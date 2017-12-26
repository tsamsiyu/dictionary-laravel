<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Frontend'], function () {
    Route::get('/words', 'WordsController@search');
    Route::post('/words', 'WordsController@create');
    Route::put('/words/{word}', 'WordsController@update');

    Route::get('/users/self', 'UserController@self');
});
