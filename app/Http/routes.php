<?php

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout',
]);

Route::post('ajaxTempFiles', function(\Illuminate\Http\Request $request){
    if($request->ajax()){
        foreach ($request->file() as $file) {
            $fileName = str_random(15) . '-' . $file->getClientOriginalName();
            $file->move(base_path() . '/public/temp/', $fileName);
            return ['route' => '/temp/' . $fileName];
        }
    }
});

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
