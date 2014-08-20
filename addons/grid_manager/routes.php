<?php
Route::group(array('prefix' => 'backend','as'=>'backend'), function()
{
    Route::get('gridmanager', 'GridController@manage');
    Route::get('addgrid', 'GridController@addgrid');
    Route::get('editgrid/{gridid}', 'GridController@editgrid');
    Route::get('addblock/{gridid}', 'GridController@addblock');
    Route::get('editblock/{blockid}', 'GridController@editblock');
    Route::get('delblock/{blockid}', 'GridController@delblock');
    Route::get('delgrid/{gridid}', 'GridController@delgrid');

    Route::post('moveblock/', 'GridController@domoveblock');

    Route::post('savegrid','GridController@savegrid');
    Route::post('doaddblock','GridController@doaddblock');
    Route::post('dosaveblock','GridController@doeditblock');
});