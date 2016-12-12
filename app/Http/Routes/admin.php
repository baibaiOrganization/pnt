<?php

Route::group(['namespace' => 'admin'], function () {

    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'users.index'
    ]);

    Route::post('generateExcel/{type}', [
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

    Route::get('listado-usuarios', [
        'uses' => 'AdminController@index',
        'as' => 'admin.usersList'
    ]);

    Route::get('usuario/editar/{id}', [
        'uses' => 'AdminController@edit',
        'as' => 'admin.userEdit'
    ]);

    Route::post('usuario/editar/{id}', [
        'uses' => 'AdminController@update',
        'as' => 'admin.userEdit'
    ]);

    Route::get('usuario/nuevo', [
        'uses' => 'AdminController@add',
        'as' => 'admin.userCreate'
    ]);

    Route::post('usuario/nuevo', [
        'uses' => 'AdminController@create',
        'as' => 'admin.userCreate'
    ]);


    Route::post('selected/update', [
        'as' => 'admin.curador.selectedUpdate',
        'uses' => 'CuradorController@selectedUpdate'
    ]);
});

