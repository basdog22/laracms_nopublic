<?php


Route::get('/', 'LaraController@showMainpage');
Route::get('page/{slug}', 'LaraController@showpage');



Route::group(array('prefix' => 'backend','as'=>'backend'), function()
{

    Route::get('seo', 'LaraBackendController@seo');
    Route::get('menus', 'LaraBackendController@menus');
    Route::get('newmenu', 'LaraBackendController@newmenu');

    Route::get('contenttype', 'LaraBackendController@contentypes');
    Route::get('imggallery/{path?}', 'LaraBackendController@imggallery');

    Route::get('newmenuitem/{menuid}', 'LaraBackendController@newmenuitem');
    Route::get('menuitems/{menuid}','LaraBackendController@menuitems');
    Route::get('editmenu/{menuid}','LaraBackendController@editmenu');
    Route::get('editmenuitem/{menuitemid}','LaraBackendController@editmenuitem');
    Route::get('delmenuitem/{menuitemid}','LaraBackendController@delmenuitem');
    Route::get('delmenu/{menuid}','LaraBackendController@delmenu');

    Route::get('editseo/{type}/{contentid}','LaraBackendController@editseo');


    Route::get('settings', 'LaraBackendController@settings');

    Route::get('pages', 'LaraBackendController@pages');
    Route::get('newpage', 'LaraBackendController@newpage');
    Route::get('editpage/{pageid}', 'LaraBackendController@editpage');


    Route::post('savesettings', 'LaraBackendController@savesettings');
    Route::post('menuitemsort', 'LaraBackendController@menuitemsort');

    Route::post('addseo', 'LaraBackendController@addseo');
    Route::post('saveseo', 'LaraBackendController@saveseo');
    Route::post('savemenu', 'LaraBackendController@savemenu');
    Route::post('addmenu', 'LaraBackendController@addmenu');
    Route::post('addmenuitem', 'LaraBackendController@addmenuitem');
    Route::post('savemenuitem', 'LaraBackendController@savemenuitem');
    Route::post('savepage', 'LaraBackendController@savepage');
});