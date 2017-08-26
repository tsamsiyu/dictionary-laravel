<?php

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users/self', 'UserController@self');
    Route::get('/jurisdictions/{jurisdiction}', 'JurisdictionController@item');

    Route::resource('jurisdictions', 'JurisdictionController', ['only' => ['store', 'destroy', 'update', 'index']]);
    Route::resource('companies', 'CompanyController', ['only' => ['store']]);
});
