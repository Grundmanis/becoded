<?php
Route::group(['namespace' => 'Grundmanis\Becoded\Controllers', 'prefix' => 'becoded', 'middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth:becoded_user']], function () {
        Route::get('/', ['as' => 'becoded.dashboard', 'uses' => 'BecodedController@index']);
        Route::get('users/', ['as' => 'becoded.users', 'uses' => 'BecodedController@getUsers']);
        Route::get('users/add', ['as' => 'becoded.users.add', 'uses' => 'BecodedController@getAddUser']);
        Route::post('users/add', ['as' => 'becoded.users.add', 'uses' => 'BecodedController@postAddUser']);
        Route::get('users/delete/{id}', ['as' => 'becoded.users.delete', 'uses' => 'BecodedController@getDeleteUser']);
        Route::get('users/edit/{id}', ['as' => 'becoded.users.edit', 'uses' => 'BecodedController@getEditUser']);
        Route::post('users/edit/{id}', ['as' => 'becoded.users.edit', 'uses' => 'BecodedController@postEditUser']);
    });

    Route::get('login', ['as' => 'becoded.login', 'uses' => 'BecodedAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'becoded.login','uses' => 'BecodedAuth\LoginController@login']);
    Route::post('logout', ['as' => 'becoded.logout','uses' => 'BecodedAuth\LoginController@logout']);
    Route::post('password/email', ['as' => 'becoded.email','uses' => 'BecodedAuth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset', ['as' => 'becoded.password.request','uses' => 'BecodedAuth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/reset', ['as' => 'becoded.password.request','uses' => 'BecodedAuth\ResetPasswordController@reset']);
    Route::get('password/reset/{token}', ['as' => 'becoded.reset','uses' => 'BecodedAuth\ResetPasswordController@showResetForm']);
    Route::get('register', ['as' => 'becoded.register','uses' => 'BecodedAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'becoded.register','uses' => 'BecodedAuth\RegisterController@register']);
    

});