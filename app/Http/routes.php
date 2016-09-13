<?php

Route::get('logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout',
    ]
);

Route::group(['middleware' => ['userLogged']], function () {
    require __DIR__ . '/Routes/auth.php';
});

Route::group(['middleware' => ['userAuth']], function () {
    Route::group(['prefix' => 'premios'], function () {
        require __DIR__ . '/Routes/front.php';
    });

    Route::group(['prefix' => 'admin'], function () {
        require __DIR__ . '/Routes/admin.php';
    });
});

/*Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return Redirect::back();
})->where([
    'lang' => 'en|es|pt'
]);*/