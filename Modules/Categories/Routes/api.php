<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::group(['namespace' => 'Api'], function() {
        Route::group(['namespace' => 'V1', 'prefix' => 'v1'], function() {
            Route::group(['middleware' => ['auth:api']], function() {
                Route::group(['prefix' => 'categories'], function() {
                    Route::get('/', 'AdsController@index');
                    Route::post('store', 'CategoriesController@store');
                    Route::post('update', 'CategoriesController@update');
                    Route::post('delete', 'CategoriesController@delete');
                });
            });
        });
});
