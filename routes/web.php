<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


// Auth::routes(['verify' => true]);

Route::get('fix', function () {
    Artisan::call('migrate');
    Artisan::call('cache:clear');
});


Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Web'], function () {
    /*************************************************************************
     * AUTHENTICATION
     *************************************************************************/
    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::get('logout', 'AuthController@logoutGetRequest')->name('logoutGetRequest');
        Route::post('keepalive', 'AuthController@keepalive')->name('keepalive');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'namespace' => 'Web'
    ],
    function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'isAdmin']], function () {
            /*************************************************************************
             * AUTHENTICATION
             *************************************************************************/
            Route::group(['prefix' => 'auth'], function () {
                Route::get('user', 'AuthController@user');
            });

            /*************************************************************************
             * GROUPS
             *************************************************************************/
            Route::group(['prefix' => 'groups'], function () {
                Route::group(['middleware' => ['hasPermission:create-group']], function () {
                    Route::post('store', 'GroupsController@store')->name('groups.store');
                    Route::get('create', 'GroupsController@create')->name('groups.create');
                });
                Route::group(['middleware' => ['hasPermission:index-groups']], function () {
                    Route::get('all', 'GroupsController@all')->name('groups.all');
                    Route::match(['GET', 'POST'], 'index', 'GroupsController@index')->name('groups.index');
                });
                Route::group(['middleware' => ['hasPermission:update-group']], function () {
                    Route::post('update', 'GroupsController@update')->name('groups.update');
                });
                Route::group(['middleware' => ['hasPermission:update-group-permissions']], function () {
                    Route::post('updateGroupPermissions', 'GroupsController@updateGroupPermissions')->name('groups.updateGroupPermissions');
                });

                Route::group(['middleware' => ['hasPermission:delete-group']], function () {
                    Route::post('delete', 'GroupsController@delete')->name('groups.delete');
                });
                Route::group(['perfix' => 'modals'], function () {
                    Route::group(['middleware' => ['hasPermission:create-group']], function () {
                        Route::get('createModal', 'GroupsController@createModal')->name('groups.modals.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-group']], function () {
                        Route::get('updateGroupModal/{id?}', 'GroupsController@updateGroupModal')->name('groups.modals.update');
                    });
                    Route::group(['middleware' => ['hasPermission:update-group-permissions']], function () {
                        Route::get('updateGroupPermisisonsModal/{id?}', 'GroupsController@updateGroupPermissionsModal')->name('groups.modals.updatePermissions');
                    });
                });
            });

            /*************************************************************************
             * Users
             *************************************************************************/
            Route::group(['prefix' => 'users'], function () {
                Route::group(['middleware' => ['hasPermission:create-user']], function () {
                    Route::post('store', 'UsersController@store')->name('users.store');
                    Route::get('create', 'UsersController@create')->name('users.create');
                });
                Route::group(['middleware' => ['hasPermission:index-users']], function () {
                    Route::get('all', 'UsersController@all')->name('users.all');
                    Route::match(['GET', 'POST'], 'index', 'UsersController@index')->name('users.index');
                });
                Route::get('getUserById', 'UsersController@getUserById')->name('users.getUserById');
                Route::group(['middleware' => ['hasPermission:update-user']], function () {
                });
                Route::post('update', 'UsersController@update')->name('users.update');
                Route::post('suspend', 'UsersController@suspend')->name('users.suspend');
                Route::post('unsuspend', 'UsersController@unsuspend')->name('users.unSuspend');
                Route::post('updatePassword', 'UsersController@updatePassword')->name('users.updatePassword');
                Route::post('updateCustomData', 'UsersController@updateCustomData')->name('users.updateCustomData');
                Route::group(['middleware' => ['hasPermission:update-user-permissions']], function () {
                    Route::post('updateUserPermissions', 'UsersController@updateUserPermissions')->name('users.updateUserPermissions');
                });
                Route::group(['middleware' => ['hasPermission:delete-user']], function () {
                    Route::post('delete', 'UsersController@delete')->name('users.delete');
                });
                Route::get('profile', 'UsersController@userProfile')->name('users.my-profile');
                Route::group(['perfix' => 'modals'], function () {
                    Route::group(['middleware' => ['hasPermission:create-user']], function () {
                        Route::get('createModal', 'UsersController@createModal')->name('users.modals.create');
                    });
                    Route::group(['middleware' => ['hasPermission:update-user']], function () {
                        Route::get('updateUserModal/{id?}', 'UsersController@updateUserModal')->name('users.modals.update');
                    });
                    Route::group(['middleware' => ['hasPermission:suspend-user']], function () {
                        Route::get('suspendUserModal/{id?}', 'UsersController@suspendUserModal')->name('users.modals.suspend');
                    });
                    Route::group(['middleware' => ['hasPermission:update-user-permissions']], function () {
                        Route::get('updateUserPermisisonsModal/{id?}', 'UsersController@updateUserPermissionsModal')->name('users.modals.updatePermissions');
                    });
                });
                Route::get('taginput', 'UsersController@userTagSearch')->name('users.tagsinput');
            });
        });

        Route::group(['middleware' => ['web', 'guest']], function () {
            /*************************************************************************
             * DEFAULT
             *************************************************************************/
            Route::get('login', 'AuthController@showLoginForm');

            Route::get('sssssss',function(){
                return view('front.pages.order-user-mail');
            });
            /*************************************************************************
             * AUTHENTICATION
             *************************************************************************/
            Route::group(['prefix' => 'auth'], function () {
                Route::get('login', 'AuthController@showLoginForm')->name('login');
                Route::post('login', 'AuthController@login');
                Route::post('register', 'AuthController@register');
                Route::get('password/reset', 'AuthController@showLinkRequestForm')->name('password.request');
                Route::post('password/email', 'AuthController@sendResetLinkEmail')->name('password.email');
                Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
            });
        });

        /**************************************************************************
         * FRONT
         **************************************************************************/
        Route::group(['namespace' => 'Front'], function () {
            /*************************************************************************
             * HOME
             *************************************************************************/
            Route::get('/', 'HomeController@index')->name('front.home');
            Route::get('pages','HomeController@pages')->name('staticPages');
            Route::get('setLang/{lang}','HomeController@setLocale')->name('setLang');
            Route::get('getLocation','HomeController@locationSearch')->name('locations.find');
            /*************************************************************************
             * How Works
             *************************************************************************/

            /*************************************************************************
             * ABOUT US
             *************************************************************************/
            Route::get('/about/{id?}/{sub_id?}', 'HomeController@about')->name('front.about');
            Route::get('/reports', 'HomeController@reports')->name('front.reports');
            Route::get('/autoComplete', 'HomeController@autoComplete')->name('front.autoComplete');
            Route::get('/autoCompleteResults', 'HomeController@autoCompleteResults')->name('front.autoCompleteResults');



            /*************************************************************************
             * Terms
             *************************************************************************/
            Route::get('/terms', 'TermsController@index')->name('front.terms');
            Route::get('/privacies', 'TermsController@indexPrivacy')->name('front.privacies');

            /*************************************************************************
             * How Works
             *************************************************************************/
            Route::get('/how-works', 'HowWorksController@index')->name('front.how_works');

            /*************************************************************************
             * CAREERS
             *************************************************************************/
            Route::get('/careers', 'CareersController@index')->name('front.careers');
            Route::get('/careers/{id}/{slug?}', 'CareersController@show')->name('front.careerSingle');

            /*************************************************************************
             * CONTACT US
             *************************************************************************/
            Route::get('/contact-us', 'ContactUsController@index')->name('front.contact-us');
            Route::get('/contact-via', 'ContactUsController@via')->name('front.contact-via');
            Route::post('/contact-us/subscribe', 'ContactUsController@subscribe')->name('front.subscribe');
            Route::get('/subscribe', 'ContactUsController@subForm')->name('front.subscribe.view');

            /*************************************************************************
             * BLOG
             *************************************************************************/
            Route::get('/blogs/{category_id?}', 'BlogsController@index')->name('front.blogs');
            Route::get('/blog/{id}-{slug?}', 'BlogsController@show')->name('front.single_blog');

            /*************************************************************************
             * SERVICES
             *************************************************************************/
            Route::get('/services/{id}', 'ServicesController@show')->name('front.services');
        });

        /**************************************************************************
         * GUEST
         **************************************************************************/
        Route::group(['middleware' => ['guest']], function () {
            Route::group(['namespace' => 'Front'], function () {
                Route::get('login', 'HomeController@login')->name('front.login');
            });
            Route::post('login', 'AuthController@login')->name('front.login');

            Route::post('register', 'AuthController@register')->name('register');
        });
    }
);
