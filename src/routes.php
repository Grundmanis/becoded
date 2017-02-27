<?php
Route::group(['namespace' => 'Grundmanis\Becoded\Controllers', 'prefix' => 'becoded'], function () {
    Route::get('/', ['as' => 'becoded_path', 'uses' => 'BecodedController@index']);
});