<?php
/**
 * Routes for : HomeVideo
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'HomeVideo'], function () {
	    Route::get('homevideos', 'HomeVideosController@index')->name('homevideos.index');
	    
	    Route::get('homevideos/{homevideo}/edit', 'HomeVideosController@edit')->name('homevideos.edit');
	    Route::patch('homevideos/{homevideo}', 'HomeVideosController@update')->name('homevideos.update');
	    
	    //For Datatable
	    Route::post('homevideos/get', 'HomeVideosTableController')->name('homevideos.get');
	});
	
});