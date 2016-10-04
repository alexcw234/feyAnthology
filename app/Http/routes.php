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
    | anything sensitive (see how it's not even in an 'auth'?)
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

        Route::get('reqs/cats/mycats', 'CatsController@userCP_index');



        /*
        |--------------------------------------------------------------------------
        | Contributor Routes
        |--------------------------------------------------------------------------
        | Controllers called by these routes will include permission check for
        | contributor (or higher) status
        |
        |
        */
        Route::post('submission/new', 'WorksController@store');

        /*
        |--------------------------------------------------------------------------
        | Moderator Routes
        |--------------------------------------------------------------------------
        | Controllers called by these routes will include permission check for
        | moderator (or higher) status
        |
        |
        */
        Route::get('reqs/pending/{catID}', 'WorksController@pending');

        Route::post('submission/setworkapproval', 'WorksController@setApproval');


        /*
        |--------------------------------------------------------------------------
        | Archive Manager Routes
        |--------------------------------------------------------------------------
        | Controllers called by these routes will include permission check for
        | archive manager (or higher) status
        |
        |
        */
        Route::get('role/promote/{catID}/{userID}', 'UGCController@ContributortoMod');

        Route::get('role/demote/{catID}/{userID}', 'UGCController@ModtoContributor');

        Route::get('category_settings/{catID}', 'ArchiveManagerController@LoadCatSettings');

        /*
        |--------------------------------------------------------------------------
        | SuperAdministrator Routes
        |--------------------------------------------------------------------------
        | Controllers called by these routes are only available to the superadmin.
        | This is where the real sneaky stuff happens!
        |
        */
        Route::group(['middleware' => ['authSuperAdmin']], function() {

          Route::get('/superpanel', function() {
              return view('superpanel');
          });
          Route::get('/userperms', 'AdminPanelController@userperms_getmenu');

          Route::post('/super/confirmthis', 'AdminPanelController@userperms_getselection');

          Route::post('/super/change/user/role', 'AdminPanelController@SuperAlterUGC');

        });

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
