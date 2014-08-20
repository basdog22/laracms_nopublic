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

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

Route::group(array('before' => 'auth','as'=>'backend'), function()
{
    Route::get('backend/','BackendController@dashboard');

    Route::get('backend/help','BackendController@help');
    Route::get('backend/dashboard','BackendController@dashboard');

    Route::get('languages/manage','LanguagesController@manage');
    Route::get('languages/toggle/{langid}','LanguagesController@toggle');
    Route::get('languages/new','LanguagesController@newlang');
    Route::get('languages/setcurrent/{langid}','LanguagesController@setcurrent');
    Route::get('languages/del/{langid}','LanguagesController@dellang');

    Route::get('addons/manage','AddonsController@manage');
    Route::get('addons/uninstall/{addonid}','AddonsController@uninstall');
    Route::get('addons/install/{addonid}','AddonsController@install');
    Route::get('addons/new','AddonsController@newaddon');

    Route::get('themes/manage','ThemesController@manage');
    Route::get('themes/uninstall/{themeid}','ThemesController@uninstall');
    Route::get('themes/install/{themeid}','ThemesController@install');
    Route::get('themes/activate/{themeid}','ThemesController@activate');
    Route::get('themes/new','ThemesController@newtheme');

    Route::get('users/profile/{userid?}','UsersController@profile');
    Route::get('users/manage','UsersController@manage');
    Route::get('users/new','UsersController@newuser');
    Route::get('users/edituser/{userid}','UsersController@edituser');

    Route::post('backend/search','BackendController@search');
    Route::post('users/adduser','UsersController@adduser');
    Route::post('users/saveuser','UsersController@saveuser');
    Route::post('languages/addlang','LanguagesController@addlang');
});


Route::controller("uploads",'UploadsController');

Route::controller('users', 'UsersController');
