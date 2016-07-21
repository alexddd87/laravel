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



Route::group(['middleware' => 'api', 'prefix' => 'api/v1'], function () {
    Route::resource('contents', 'Api\ContentsController');
});

Route::get('/', function(){
    return'Main page';
});
