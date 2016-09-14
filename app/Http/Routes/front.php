<?php

Route::get('/', [
    'uses' => 'HomeController@chooseForm',
    'as' => 'choose'
]);

Route::get('finalizar-pago', [
    'uses' => 'PayController@index',
    'as' => 'payClient'
]);

Route::get('semana', [
    'uses' => 'SemanaController@index',
    'as' => 'semana'
]);

Route::post('semana', [
    'uses' => 'SemanaController@create',
    'as' => 'semanaPost'
]);

Route::get('colon', [
    'uses' => 'ColonController@index',
    'as' => 'colon'
]);

Route::post('colon', [
    'uses' => 'ColonController@create',
    'as' => 'colonPost'
]);