<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Frontend'], function () {
    Route::post('/new-word', 'MyDictionaryController@newWord');
    Route::get('/users/self', 'UserController@self');
});
