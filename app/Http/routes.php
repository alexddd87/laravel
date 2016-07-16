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
    Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function()
    {
        Route::group(['middleware' => ['adminOnly']], function () {
            //Route::post('enable', 'AjaxController@enable');

/*
            # Admin Dashboard
            Route::get('/', [
                'as'=>'admin-dashboard',
                'uses'=>'\Admin\AdminDashboardController@Index'
            ]);

            # Admin Logout
            Route::get('/logout', [
                'as'=>'admin-logout',
                'uses'=>'AdminLoginController@logout'
            ]);

*/
        });

    });

    Route::auth();

    //Route::get('/', 'HomeController@index');



});

Route::group(['middleware' => 'api', 'prefix' => 'api/v1'], function () {
    Route::resource('contents', 'Api\ContentsController');
});

Route::get('/rates','MainController@index');
Route::get('article', 'ArticleController@index');