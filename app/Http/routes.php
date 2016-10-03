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

  Route::get('users/{catID}','UserController@indexbyID');

  Route::get('finduser/{catID}', 'UserController@findUserInCat');
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
    /*
    |--------------------------------------------------------------------------
    | Displaycheck routes
    |--------------------------------------------------------------------------
    | Routes with the displaycheck prefix are for returning the users' global
    | or category group to the front end, where depending on what is needed
    | will show/hide parts of the page. Note that this is NOT to be used for
    | anything sensitive (see how it's not even in an 'auth' middleware?)
    | and actual validation is still needed for any features.
    |
    */
    Route::group(array('prefix' => 'displaycheck'), function() {

        Route::get('group/{catID}', 'UGCController@check');

        Route::get('global/', 'UGCController@checkGlobal');

    });

    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    | These are routes that require user to at least be logged in.
    | 
    |
    |
    */

    Route::group(['middleware' => ['auth']], function() {

        Route::post('submission/new', 'WorksController@store');

        Route::post('submission/setworkapproval', 'WorksController@setApproval');

        Route::get('reqs/pending/{catID}', 'WorksController@pending');

        Route::get('reqs/cats/mycats', 'CatsController@userCP_index');



        Route::get('role/promote/{catID}/{userID}', 'UGCController@ContributortoMod');

        Route::get('role/demote/{catID}/{userID}', 'UGCController@ModtoContributor');

    });

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
