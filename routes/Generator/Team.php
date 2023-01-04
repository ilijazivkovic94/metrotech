<?php
/**
 * Team
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Team'], function () {
        Route::resource('teams', 'TeamsController');
        //For Datatable
        Route::post('teams/get', 'TeamsTableController')->name('teams.get');
    });
    
});