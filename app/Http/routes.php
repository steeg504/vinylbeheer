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

use App\Http\Controllers\PageController;

Route::auth();
Route::get('sitegroups/{sitegroup_id}', 'Sitegroupcontroller@setSitegroup');
Route::get('sitegroups', 'PageController@getPage');

Route::group(array('middleware' => array('sitegroup')),function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::resource('singles', 'SingleController');
    Route::resource('artists', 'ArtistController');
    Route::get('{name}', 'PageController@getPage');
});



