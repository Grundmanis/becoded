<?php
Route::group(['namespace' => 'Grundmanis\Becoded\Controllers', 'prefix' => 'becoded', 'middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth:becoded_user']], function () {
        
        Route::get('/', ['as' => 'becoded.dashboard', 'uses' => 'BecodedController@index']);
        Route::post('logout', ['as' => 'becoded.logout','uses' => 'BecodedAuth\LoginController@logout']);

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'becoded.users', 'uses' => 'UserController@getUsers']);
            Route::get('/add', ['as' => 'becoded.users.add', 'uses' => 'UserController@getAddUser']);
            Route::post('/add', ['as' => 'becoded.users.add', 'uses' => 'UserController@postAddUser']);
            Route::get('/delete/{id}', ['as' => 'becoded.users.delete', 'uses' => 'UserController@getDeleteUser']);
            Route::get('/edit/{id}', ['as' => 'becoded.users.edit', 'uses' => 'UserController@getEditUser']);
            Route::post('/edit/{id}', ['as' => 'becoded.users.edit', 'uses' => 'UserController@postEditUser']);
        });

        Route::group(['prefix' => 'pages'], function () {
            Route::get('/', ['as' => 'becoded.pages', 'uses' => 'PageController@getPages']);
            Route::post('/', ['as' => 'becoded.pages', 'uses' => 'PageController@postPages']);
            Route::get('/add', ['as' => 'becoded.pages.add', 'uses' => 'PageController@getAddPage']);
            Route::post('/add', ['as' => 'becoded.pages.add', 'uses' => 'PageController@postAddPage']);
            Route::get('/delete/{id}', ['as' => 'becoded.pages.delete', 'uses' => 'PageController@getDeletePage']);
            Route::get('/edit/{id}', ['as' => 'becoded.pages.edit', 'uses' => 'PageController@getEditPage']);
            Route::post('/edit/{id}', ['as' => 'becoded.pages.edit', 'uses' => 'PageController@postEditPage']);
        });

        Route::group(['prefix' => 'logs'], function () {
            Route::get('/', ['as' => 'becoded.logs', 'uses' => 'BaseController@getLogs']);
        });
        
    });

    Route::get('login', ['as' => 'becoded.login', 'uses' => 'BecodedAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'becoded.login','uses' => 'BecodedAuth\LoginController@login']);
    Route::post('password/email', ['as' => 'becoded.email','uses' => 'BecodedAuth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset', ['as' => 'becoded.password.request','uses' => 'BecodedAuth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/reset', ['as' => 'becoded.password.request','uses' => 'BecodedAuth\ResetPasswordController@reset']);
    Route::get('password/reset/{token}', ['as' => 'becoded.reset','uses' => 'BecodedAuth\ResetPasswordController@showResetForm']);

});

Route::get('{slug}', [
    'uses' => 'Grundmanis\Becoded\Controllers\PageController@getCustomPage'
])->where('slug', '([A-Za-z0-9\-\/]+)');