<?php

Route::group(['namespace' => 'admin'], function () {

    //Route::get('/', ['as'=>'admin','uses' => 'UserController@index']);
    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'users.index'
    ]);

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

    Route::get('usuarios/colon', [
        'uses' => 'UserController@colonUsers',
        'as' => 'colonUsers'
    ]);

    Route::get('usuarios/semana', [
        'uses' => 'UserController@semanaUsers',
        'as' => 'semanaUsers'
    ]);

    Route::get('usuarios/semana/{id}', [
        'uses' => 'UserController@semanaEditUser',
        'as' => 'semanaEditUser'
    ]);

    Route::get('usuarios/colon/{id}', [
        'uses' => 'UserController@colonEditUser',
        'as' => 'colonEditUser'
    ]);

    Route::post('colonUpdate/{id}', [
        'uses' => 'UserController@colonUpdate',
        'as' => 'colonUpdate'
    ]);

    Route::post('semanaUpdate/{id}', [
        'uses' => 'UserController@semanaUpdate',
        'as' => 'semanaUpdate'
    ]);

});

