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

Route::group(array('prefix' => 'admin', 'before' => 'authAdmin'), function()
{


    Route::resource('contents', 'admin\ContentsController');



    Route::get('contents/edit/{id}', [
        'as'=>'admin-contents-edit',
        'uses'=>'admin/ContentsController@edit'
    ]);

    Route::post('contents/edit/{id}', 'admin\ContentsController@save');

    Route::get('contents/add', [
        'as'=>'admin-contents-add',
        'uses'=>'ContentsController@add'
    ]);
    Route::post('contents/add', 'admin\ContentsController@add');

    Route::get('contents/delete/{user}', [
        'as'=>'admin-contents-delete',
        'uses'=>'admin\ContentsController@delete'
    ]);
    Route::post('contents/delete/{user}', 'admin\ContentsController@delete');
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
        'uses'=>'admin\AdminLoginController@logout'
    ]);

});

Route::get('admin/login', [
    'as'    => 'admin-login',
    'uses'  => 'AdminLoginController@index'
]);

Route::post('admin/login', [
    'uses'  => 'AdminLoginController@postLogin'
]);



# Index Page - Last route, no matches
Route::get('/', array('uses' => 'HomeController@Index'));