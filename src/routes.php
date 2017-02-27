<?php
Route::group(['namespace' => 'Grundmanis\Becoded\Controllers', 'prefix' => 'becoded'], function () {
    Route::get('/', ['as' => 'becoded_path', 'uses' => 'BecodedController@index']);
    Route::get('signin', ['as' => 'becoded.signin', 'uses' => 'BecodedController@signin']);

    Route::get('/signin', function() {
        return view('becoded::signin');
    });

    Route::post('/signin', [
        'uses' => 'BecodedController@postSignin',
        'as' => 'becoded.signin'
    ]);

});