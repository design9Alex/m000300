<?php

/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "administrator" middleware group. Now create something great!
|
*/

Route::group(['prefix' => backendPath('administrator')], function () {

    Route::group(['middleware' => 'auth:administrator'], function() {

    });

});
