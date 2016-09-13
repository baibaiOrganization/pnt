<?php

Route::get('finalizar-pago', [
    'uses' => 'PayController@index',
    'as' => 'payClient'
]);

Route::get('/', [
        'uses' => 'HomeController@chooseForm',
        'as' => 'choose'
    ]
);

Route::get('semana', [
        'uses' => 'SemanaController@index',
        'as' => 'semana'
    ]
);

Route::get('colon', [
        'uses' => 'ColonController@index',
        'as' => 'colon'
    ]
);