<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(['middleware' => 'web'], function () {
    Route::group(['namespace'=>'admin', 'prefix' => 'admin'], function()
    {
        Route::group(['middleware' => ['adminOnly']], function () {
            Route::post('enable', 'AjaxController@enable');


            # Admin Dashboard
            Route::get('/', [
                'as'=>'admin-dashboard',
                'uses'=>'admin\AdminDashboardController@Index'
            ]);

            # Admin Logout
            Route::get('/logout', [
                'as'=>'admin-logout',
                'uses'=>'AdminLoginController@logout'
            ]);

            # Index Page - Last route, no matches
            Route::get('/', array('as'=>'home', 'uses' => 'HomeController@Index'));

        });

        // Authentication routes...
        Route::get('login', array('as'=>'admin-login', 'uses'=>'AdminLoginController@loginView'));
        Route::post('login', array('as'=>'admin-login', 'uses'=>'AdminLoginController@login'));
        Route::get('logout', array('as'=>'admin-logout', 'uses'=>'AdminLoginController@logout'));
    });

    Route::auth();

    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('contents', 'Admin\ContentsController');
});

Route::get('/rates','MainController@index');
Route::get('article', 'ArticleController@index');