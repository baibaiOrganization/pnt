<?php

Route::get('finalizar-pago', [
    'uses' => 'PayController@index',
    'as' => 'payClient'
]);
