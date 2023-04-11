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



Route::prefix('categories')->group(function() {
    Route::get('/', 'CategoriesController@index');

});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'namespace' => 'Web'
    ],
    function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'isAdmin']], function () {
            Route::prefix('categories')->group(function () {
                Route::group(['middleware' => ['hasPermission:index-categories']], function () {
                    Route::match(['GET', 'POST'], 'index', 'CategoriesController@index')->name('categories.index');
                });
                Route::group(['middleware' => ['hasPermission:create-category']], function () {
                    Route::post('store', 'CategoriesController@store')->name('categories.store');
                    Route::get('create', 'CategoriesController@create')->name('categories.create');
                });
                Route::group(['middleware' => ['hasPermission:update-category']], function () {
                    Route::post('update', 'CategoriesController@update')->name('categories.update');
                });
                Route::group(['middleware' => ['hasPermission:delete-category']], function () {
                    Route::post('delete', 'CategoriesController@delete')->name('categories.delete');
                });
                Route::group(['perfix' => 'modals'], function () {
                    Route::group(['middleware' => ['hasPermission:create-category']], function () {
                        Route::get('createCatModal', 'CategoriesController@createCatModal')->name('categories.modals.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-category']], function () {
                        Route::get('UpdateCatModal/{id?}', 'CategoriesController@UpdateCatModal')->name('categories.modals.update');
                    });
                });
            });
        });
    }
);

