<?php

Route::group(['namespace' => 'Admin'], function () {

    //Route::get('/', ['as'=>'admin','uses' => 'UserController@index']);
    Route::get('/', function(){
        dd('Dashboard');
    });

    Route::get('cliente/{id}', [
        'uses' => 'UserController@showClient',
        'as' => 'clientDetail'
    ]);

    Route::post('updatePayClient', [
        'uses' => 'UserController@updatePayClient',
        'as' => 'updatePayClient'
    ]);
    Route::post('/', [
        'uses' => 'UserController@searchClient',
        'as' => 'UserSearch'
    ]);
    Route::post('updateClient', [
        'uses' => 'UserController@updateClient',
        'as' => 'updateClient'
    ]);

    Route::get('usersExcel', [
        'uses' => 'ReportController@usersExcel',
        'as' => 'usersExcel'
    ]);


});

