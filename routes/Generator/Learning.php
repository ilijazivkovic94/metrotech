<?php
/**
 * Learning
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Learning'], function () {
        Route::resource('learnings', 'LearningsController');
        //For Datatable
        Route::post('learnings/get', 'LearningsTableController')->name('learnings.get');
    });
    
});