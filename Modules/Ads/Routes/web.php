<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'namespace' => 'Web'
    ],
    function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'isAdmin']], function () {
            Route::prefix('ads')->group(function () {
                Route::group(['middleware' => ['hasPermission:index-ads']], function () {
                    Route::match(['GET', 'POST'], 'index', 'AdsController@index')->name('ads.index');
                });
                Route::group(['middleware' => ['hasPermission:create-ad']], function () {
                    Route::post('store', 'AdsController@store')->name('ads.store');
                    Route::get('create', 'AdsController@create')->name('ads.create');
                });
                Route::group(['middleware' => ['hasPermission:update-ad']], function () {
                    Route::post('update', 'AdsController@update')->name('ads.update');
                });
                Route::group(['middleware' => ['hasPermission:delete-ad']], function () {
                    Route::post('delete', 'AdsController@delete')->name('ads.delete');
                });
                Route::group(['perfix' => 'modals'], function () {
                    Route::group(['middleware' => ['hasPermission:create-ad']], function () {
                        Route::get('createAdModal', 'AdsController@createAdModal')->name('ads.modals.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-ad']], function () {
                        Route::get('UpdateAdModal/{id?}', 'AdsController@UpdateAdModal')->name('ads.modals.update');
                    });
                });
            });
        });
    }
);
