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
            Route::prefix('terms')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-terms-conditions']], function () {
                        Route::match(['GET', 'POST'], 'index', 'CmsController@index')->name('terms.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-terms-condition']], function () {
                        Route::post('store', 'CmsController@store')->name('terms.store');
                        Route::get('create', 'CmsController@create')->name('terms.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-terms-condition']], function () {
                        Route::post('update', 'CmsController@update')->name('terms.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-terms-condition']], function () {
                        Route::post('delete', 'CmsController@delete')->name('terms.delete');
                        Route::post('deleteAboutAttachment', 'CmsController@deleteAttachments')->name('terms.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-terms-condition']], function () {
                            Route::get('createTermModal', 'CmsController@createTermModal')->name('terms.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-terms-condition']], function () {
                            Route::get('UpdateTermModal/{id?}', 'CmsController@UpdateTermModal')->name('terms.modals.update');
                        });
                    });
                });
            });
            Route::prefix('privacies')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-privacies']], function () {
                        Route::match(['GET', 'POST'], 'index', 'PrivaciesController@index')->name('privacies.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-privacy']], function () {
                        Route::post('store', 'PrivaciesController@store')->name('privacies.store');
                        Route::get('create', 'PrivaciesController@create')->name('privacies.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-privacy']], function () {
                        Route::post('update', 'PrivaciesController@update')->name('privacies.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-privacy']], function () {
                        Route::post('delete', 'PrivaciesController@delete')->name('privacies.delete');
                        Route::post('deleteAboutAttachment', 'PrivaciesController@deleteAttachments')->name('privacies.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-privacy']], function () {
                            Route::get('createPrivacyModal', 'PrivaciesController@createPrivacyModal')->name('privacies.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-privacy']], function () {
                            Route::get('UpdatePrivacyModal/{id?}', 'PrivaciesController@UpdatePrivacyModal')->name('privacies.modals.update');
                        });
                    });
                });
            });

            Route::prefix('awards')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-awards']], function () {
                        Route::match(['GET', 'POST'], 'index', 'AwardsController@index')->name('awards.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-award']], function () {
                        Route::post('store', 'AwardsController@store')->name('awards.store');
                        Route::get('create', 'AwardsController@create')->name('awards.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-award']], function () {
                        Route::post('update', 'AwardsController@update')->name('awards.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-award']], function () {
                        Route::post('delete', 'AwardsController@delete')->name('awards.delete');
                        Route::post('deleteAboutAttachment', 'AwardsController@deleteAttachments')->name('awards.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-award']], function () {
                            Route::get('createAwardModal', 'AwardsController@createAwardModal')->name('awards.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-award']], function () {
                            Route::get('UpdateAwardModal/{id?}', 'AwardsController@UpdateAwardModal')->name('awards.modals.update');
                        });
                    });
                });
            });


            Route::prefix('magazines')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-magazines']], function () {
                        Route::match(['GET', 'POST'], 'index', 'MagazinesController@index')->name('magazines.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-magazine']], function () {
                        Route::post('store', 'MagazinesController@store')->name('magazines.store');
                        Route::get('create', 'MagazinesController@create')->name('magazines.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-magazine']], function () {
                        Route::post('update', 'MagazinesController@update')->name('magazines.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-magazine']], function () {
                        Route::post('delete', 'MagazinesController@delete')->name('magazines.delete');
                        Route::post('deleteAboutAttachment', 'MagazinesController@deleteAttachments')->name('magazines.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-magazine']], function () {
                            Route::get('createMagazineModal', 'MagazinesController@createMagazineModal')->name('magazines.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-magazine']], function () {
                            Route::get('UpdateMagazineModal/{id?}', 'MagazinesController@UpdateMagazineModal')->name('magazines.modals.update');
                        });
                    });
                });
            });

            Route::prefix('socials_content')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-socials-content']], function () {
                        Route::match(['GET', 'POST'], 'index', 'SocialsController@index')->name('socials_content.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-social-content']], function () {
                        Route::post('store', 'SocialsController@store')->name('socials_content.store');
                        Route::get('create', 'SocialsController@create')->name('socials_content.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-social-content']], function () {
                        Route::post('update', 'SocialsController@update')->name('socials_content.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-social-content']], function () {
                        Route::post('delete', 'SocialsController@delete')->name('socials_content.delete');
                        Route::post('deleteAboutAttachment', 'SocialsController@deleteAttachments')->name('socials_content.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-social-content']], function () {
                            Route::get('createSocialModal', 'SocialsController@createSocialModal')->name('socials_content.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-social-content']], function () {
                            Route::get('UpdateSocialModal/{id?}', 'SocialsController@UpdateSocialModal')->name('socials_content.modals.update');
                        });
                    });
                });
            });

            Route::prefix('socialrooms')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-socialrooms']], function () {
                        Route::match(['GET', 'POST'], 'index', 'SocialRoomsController@index')->name('socialrooms.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-socialroom']], function () {
                        Route::post('store', 'SocialRoomsController@store')->name('socialrooms.store');
                        Route::get('create', 'SocialRoomsController@create')->name('socialrooms.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-socialroom']], function () {
                        Route::post('update', 'SocialRoomsController@update')->name('socialrooms.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-socialroom']], function () {
                        Route::post('delete', 'SocialRoomsController@delete')->name('socialrooms.delete');
                        Route::post('deleteAboutAttachment', 'SocialRoomsController@deleteAttachments')->name('socialrooms.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-socialroom']], function () {
                            Route::get('createSocialRoomModal', 'SocialRoomsController@createSocialRoomModal')->name('socialrooms.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-socialroom']], function () {
                            Route::get('UpdateSocialRoomModal/{id?}', 'SocialRoomsController@UpdateSocialRoomModal')->name('socialrooms.modals.update');
                        });
                    });
                });
            });

            Route::prefix('technologies')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-technologies']], function () {
                        Route::match(['GET', 'POST'], 'index', 'TechnologiesController@index')->name('technologies.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-technology']], function () {
                        Route::post('store', 'TechnologiesController@store')->name('technologies.store');
                        Route::get('create', 'TechnologiesController@create')->name('technologies.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-technology']], function () {
                        Route::post('update', 'TechnologiesController@update')->name('technologies.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-technology']], function () {
                        Route::post('delete', 'TechnologiesController@delete')->name('technologies.delete');
                        Route::post('deleteAboutAttachment', 'TechnologiesController@deleteAttachments')->name('technologies.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-technology']], function () {
                            Route::get('createTechnologyModal', 'TechnologiesController@createTechnologyModal')->name('technologies.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-Technology']], function () {
                            Route::get('UpdateTechnologyModal/{id?}', 'TechnologiesController@UpdateTechnologyModal')->name('technologies.modals.update');
                        });
                    });
                });
            });

            Route::prefix('reports')->group(function () {
                Route::group(['middleware' => []], function () {

                    Route::group(['middleware' => ['hasPermission:index-reports']], function () {
                        Route::match(['GET', 'POST'], 'index', 'ReportsController@index')->name('reports.index');
                    });
                    Route::group(['middleware' => ['hasPermission:create-report']], function () {
                        Route::post('store', 'ReportsController@store')->name('reports.store');
                        Route::get('create', 'ReportsController@create')->name('reports.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-report']], function () {
                        Route::post('update', 'ReportsController@update')->name('reports.update');
                    });
                    Route::group(['middleware' => ['hasPermission:delete-report']], function () {
                        Route::post('delete', 'ReportsController@delete')->name('reports.delete');
                        Route::post('deleteAboutAttachment', 'ReportsController@deleteAttachments')->name('reports.deleteAttachment');
                    });
                    Route::group(['perfix' => 'modals'], function () {
                        Route::group(['middleware' => ['hasPermission:create-report']], function () {
                            Route::get('createReportModal', 'ReportsController@createReportModal')->name('reports.modals.create');
                        });
                        Route::group(['middleware' => ['hasPermission:update-report']], function () {
                            Route::get('UpdateReportModal/{id?}', 'ReportsController@UpdateReportModal')->name('reports.modals.update');
                        });
                    });
                });
            });
        });
    }
);
