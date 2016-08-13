<?php
Route::get('login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'login'
    ]
);
Route::post('login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'login'
    ]
);

Route::get('logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout'
    ]
);

Route::post('registro', [
        'uses' => 'Auth\AuthController@postRegister',
        'as' => 'register'
    ]
);
// Password reset link request routes...
Route::get('password/email', ['uses'=>'Auth\PasswordController@getEmail','as'=>'getEmail']);
Route::post('password/email', ['uses'=>'Auth\PasswordController@postEmail','as'=>'postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses'=>'Auth\PasswordController@getReset','as'=>'getReset']);
Route::post('password/reset', ['uses'=>'Auth\PasswordController@postReset','as'=>'postReset']);
