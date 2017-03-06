<?php
Route::group(['namespace' => 'Grundmanis\Becoded\Controllers', 'prefix' => 'becoded', 'middleware' => ['web']], function () {

    Route::group(['middleware' => ['auth:becoded_user']], function () {
        Route::get('/', ['as' => 'becoded_path', 'uses' => 'BecodedController@index']);
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