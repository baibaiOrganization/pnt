<?php

Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]
);

Route::post('login', [
        'uses' => 'Auth\AuthController@loginUser',
        'as' => 'login'
    ]
);

Route::post('registro', [
        'uses' => 'Auth\AuthController@createUser',
        'as' => 'register'
    ]
);

// Password reset link request routes...
Route::get('password/email', ['uses'=>'Auth\PasswordController@getEmail','as'=>'getEmail']);
Route::post('password/email', ['uses'=>'Auth\PasswordController@postEmail','as'=>'postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses'=>'Auth\PasswordController@getReset','as'=>'getReset']);
Route::post('password/reset', ['uses'=>'Auth\PasswordController@postReset','as'=>'postReset']);
