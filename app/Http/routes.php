<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('prefix' => 'reqs'), function() {

  Route::get('cats/showall', 'CatsController@index');

  Route::get('list/{catID}', 'WorksController@index');

  Route::get('getcatname/{catID}', 'CatsController@show');

  Route::get('types/showall', 'TypesController@index');

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::group(array('prefix' => 'submission'), function() {

      Route::post('new', 'WorksController@store');

      Route::post('setworkapproval', 'WorksController@setApproval');

    });

    Route::get('reqs/cats/mycats', 'CatsController@userCP_index');

    Route::get('reqs/pending/{catID}', 'WorksController@pending');

    Route::get('check/group/{catID}', 'UGCController@check');

    Route::get('check/global/', 'UGCController@checkGlobal');
});


Route::group(['middleware' => 'web' ], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/browse', function () {
        return view('browse');
    });

    Route::get('/', function () {
        return view('welcome');
    });

});
