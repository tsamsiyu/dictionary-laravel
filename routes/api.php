<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users/self', 'UserController@self');

    Route::resource('jurisdictions', 'JurisdictionController', ['only' => ['store', 'delete', 'update', 'index']]);
    Route::resource('companies', 'CompanyController', ['only' => ['store']]);
});
