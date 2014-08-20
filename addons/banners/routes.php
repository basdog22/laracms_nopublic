<?php
Route::group(array('prefix' => 'backend','as'=>'backend'), function()
{
    Route::get('banners', 'BannersController@manage');
    Route::get('newbanner', 'BannersController@newbanner');


    Route::get('delbanner/{bannerid}', 'BannersController@delbanner');
    Route::get('editbanner/{bannerid}', 'BannersController@editbanner');



    Route::post('addbanner', 'BannersController@addbanner');
    Route::post('savebanner', 'BannersController@savebanner');

});