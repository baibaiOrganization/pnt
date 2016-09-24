<?php

Route::group(['namespace' => 'admin'], function () {

    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'users.index'
    ]);

    Route::get('generateExcel/{type}', [
        'uses' => 'UserController@generateExcel',
        'as' => 'generateExcel'
    ]);

    Route::get('search/{type}', [
        'uses' => 'UserController@searchUser',
        'as' => 'searchUser'
    ]);

    Route::get('semanaExcel', function(){
        return redirect()->to('/exports/semana.xls');
    });

    Route::get('colonExcel', function(){
        return redirect()->to('/exports/colon.xls');
    });

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

    /*
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
    ]);*/
});

