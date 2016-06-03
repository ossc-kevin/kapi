<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

$resourcePathPattern = '[0-9a-zA-Z-_@&\#\!=,:;\/\^\$\.\|\{\}\[\]\(\)\*\+\? ]+';
$servicePattern = '[_0-9a-zA-Z-.]+';

Route::group(
    ['prefix' => 'api'],
    function () use ($resourcePathPattern, $servicePattern){
        Route::get('{version}/', 'ApiController@index');
        Route::get('{version}/{service}/{resource?}', 'ApiController@handleGET')->where(
            ['service' => $servicePattern, 'resource' => $resourcePathPattern]
        );
        Route::post('{version}/{service}/{resource?}', 'ApiController@handlePOST')->where(
            ['service' => $servicePattern, 'resource' => $resourcePathPattern]
        );
        Route::put('{version}/{service}/{resource?}', 'ApiController@handlePUT')->where(
            ['service' => $servicePattern, 'resource' => $resourcePathPattern]
        );
        Route::patch('{version}/{service}/{resource?}', 'ApiController@handlePATCH')->where(
            ['service' => $servicePattern, 'resource' => $resourcePathPattern]
        );
        Route::delete('{version}/{service}/{resource?}', 'ApiController@handleDELETE')->where(
            ['service' => $servicePattern, 'resource' => $resourcePathPattern]
        );
    }
);
