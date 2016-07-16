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

            Route::get('contents', [
                'as'=>'admin-contents',
                'uses'=>'ContentsController@index'
            ]);

            Route::get('contents/edit/{id}', [
                'as'=>'admin-contents-edit',
                'uses'=>'ContentsController@edit'
            ]);

            Route::put('contents/edit/{id}', 'ContentsController@update');

            Route::get('contents/create', [
                'as'=>'admin-contents-create',
                'uses'=>'ContentsController@create'
            ]);
            Route::post('contents/create', 'ContentsController@store');

            Route::get('contents/delete/{user}', [
                'as'=>'admin-contents-delete',
                'uses'=>'admin\ContentsController@delete'
            ]);
            Route::delete('contents/destroy/{id}', 'ContentsController@destroy');
            //Route::controller('content', 'AdminUsersController');
            #/ Content app

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
    Route::resource('contents', 'admin\ContentsController');
});

Route::get('/rates','MainController@index');
Route::get('article', 'ArticleController@index');